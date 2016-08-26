<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $activkey
 * @property string $create_at
 * @property string $lastvisit
 * @property integer $superuser
 * @property integer $status
 * @property integer $gender
 *
 * The followings are the available model relations:
 * @property Profiles $profiles
 */
class User extends CActiveRecord
{
	// holds the password confirmation word
	public $repeat_password;

	//will hold the encrypted password for update actions.
	public $initialPassword;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//password and repeat password
			array('password, repeat_password', 'required', 'on'=>'insert'),
			array('password, repeat_password', 'length', 'min'=>6, 'max'=>40),
			array('password', 'compare', 'compareAttribute'=>'repeat_password'),

			array('username, password, email, create_at', 'required'),
			array('superuser, status, gender', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>20),
			array('password, email, activkey', 'length', 'max'=>128),
			array('lastvisit', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password, email, activkey, create_at, lastvisit, superuser, status, gender', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'profiles' => array(self::HAS_ONE, 'Profiles', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'password' => 'Password',
			'email' => 'Email',
			'activkey' => 'Activkey',
			'create_at' => 'Create At',
			'lastvisit' => 'Lastvisit',
			'superuser' => 'Superuser',
			'status' => 'Status',
			'gender' => 'Gender',
			'repeat_password' => 'Confirm Password'
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('activkey',$this->activkey,true);
		$criteria->compare('create_at',$this->create_at,true);
		$criteria->compare('lastvisit',$this->lastvisit,true);
		$criteria->compare('superuser',$this->superuser);
		$criteria->compare('status',$this->status);
		$criteria->compare('gender',$this->gender);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}

	public function beforeSave()
	{
		// in this case, we will use the old hashed password.
		if(empty($this->password) && empty($this->repeat_password) && !empty($this->initialPassword))
			$this->password=$this->repeat_password=$this->initialPassword;

		return parent::beforeSave();
	}

	public function afterFind()
	{
		//reset the password to null because we don't want the hash to be shown.
		$this->initialPassword = $this->password;
		$this->password = null;

		parent::afterFind();
	}

	public function saveModel($data=array())
	{
		//because the hashes needs to match
		if(!empty($data['password']) && !empty($data['repeat_password']))
		{
			$data['password'] = Yii::app()->user->hashPassword($data['password']);
			$data['repeat_password'] = Yii::app()->user->hashPassword($data['repeat_password']);
		}

		$this->attributes=$data;

		if(!$this->save())
			return CHtml::errorSummary($this);

		return true;
	}
}

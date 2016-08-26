<?php

/**
 * This is the model class for table "promote_codes".
 *
 * The followings are the available columns in table 'promote_codes':
 * @property integer $id
 * @property string $code
 * @property string $discount
 * @property integer $tenant_id
 * @property integer $customer_id
 * @property integer $wifiarea_id
 * @property string $parameters
 * @property string $created_at
 * @property integer $status
 * @property string $updated_at
 * @property string $used_at
 * @property integer $hotspot_id
 * @property integer $webapp_id
 * @property string $cloud4wi
 * @property string $data
 * @property string $v2
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Hotspot $hotspot
 * @property Tenant $tenant
 * @property Webapp $webapp
 * @property Wifiarea $wifiarea
 */
class PromoteCodes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'promote_codes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('code, discount, tenant_id, customer_id, created_at', 'required'),
			array('tenant_id, customer_id, wifiarea_id, status, hotspot_id, webapp_id', 'numerical', 'integerOnly'=>true),
			array('code, discount', 'length', 'max'=>255),
			array('parameters, updated_at, used_at, cloud4wi, data, v2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, code, discount, tenant_id, customer_id, wifiarea_id, parameters, created_at, status, updated_at, used_at, hotspot_id, webapp_id, cloud4wi, data, v2', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'hotspot' => array(self::BELONGS_TO, 'Hotspot', 'hotspot_id'),
			'tenant' => array(self::BELONGS_TO, 'Tenant', 'tenant_id'),
			'webapp' => array(self::BELONGS_TO, 'Webapp', 'webapp_id'),
			'wifiarea' => array(self::BELONGS_TO, 'Wifiarea', 'wifiarea_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'code' => 'Code',
			'discount' => 'Discount',
			'tenant_id' => 'Tenant',
			'customer_id' => 'Customer',
			'wifiarea_id' => 'Wifiarea',
			'parameters' => 'Parameters',
			'created_at' => 'Created At',
			'status' => 'Status',
			'updated_at' => 'Updated At',
			'used_at' => 'Used At',
			'hotspot_id' => 'Hotspot',
			'webapp_id' => 'Webapp',
			'cloud4wi' => 'Cloud4wi',
			'data' => 'Data',
			'v2' => 'V2',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('discount',$this->discount,true);
		$criteria->compare('tenant_id',$this->tenant_id);
		$criteria->compare('customer_id',$this->customer_id);
		$criteria->compare('wifiarea_id',$this->wifiarea_id);
		$criteria->compare('parameters',$this->parameters,true);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('updated_at',$this->updated_at,true);
		$criteria->compare('used_at',$this->used_at,true);
		$criteria->compare('hotspot_id',$this->hotspot_id);
		$criteria->compare('webapp_id',$this->webapp_id);
		$criteria->compare('cloud4wi',$this->cloud4wi,true);
		$criteria->compare('data',$this->data,true);
		$criteria->compare('v2',$this->v2,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PromoteCodes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave()
	{
		if (parent::beforeSave()) {
			{
				// for example
				$this->setAttribute("updated_at", date("Y/m/d H:i:s"));
				return true;
			}
			return false;
		}
	}

	public function getQRCode() {
		if ($this->code != "") {
			return '<img width="100%" src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . $this->code . '&choe=UTF-8" title="Promote code" />';
		} else {
			return "";
		}
	}

	public function getUserFirstName() {

		return "";

	}

	public function getUserLastName() {

		return "";

	}

	public function getTenantName() {

		return "";
	}

	public function getHtmlJsonField($fieldName) {
		$data = $this->$fieldName;
		$html = "";
		if (!empty($data)) {
			try {
				$data = json_decode($data, true);
				if(!is_array($data)) {
					$data = json_decode($data);
				}
				if(is_array($data)) {
					foreach ($data as $key => $value) {
						$html .= '<div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">' . $key . ': </div><div class="blue col-lg-10 col-md-10 col-sm-8 col-xs-8">' . $value . '</div><br/>';
					}
				}
			} catch (Exception $ex) {

			}
		}
		return $html;
	}

	/**
	 * @param $content
	 * @return mixed
	 */
	public function replacePlaceHolder($content)
	{
		// Replace placeholders
		//// {{customer.first_name}}
		if (strpos($content, '{{customer.first_name}}') !== false) {
			$content = str_replace('{{customer.first_name}}', $this->customer->first_name, $content);
		}
		//// {{customer.last_name}}
		if(strpos($content, '{{customer.last_name}}') !== false) {
			$content = str_replace('{{customer.last_name}}', $this->customer->last_name, $content);
		}
		//// {{customer.username}}
		if(strpos($content, '{{customer.username}}') !== false) {
			$content = str_replace('{{customer.username}}', $this->customer->username, $content);
		}
		//// {{tenant.name}}
		if(strpos($content, '{{tenant.name}}') !== false) {
			$content = str_replace('{{tenant.name}}', $this->tenant->name, $content);
		}
		return $content;
	}
}

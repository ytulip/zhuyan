<?php

class JosRequest {

	public $apiParas = array(); //参数列表
	public $ApiMethod = ""; //接口名称

	public function check() {
		//检测函数
	}

	public function getAppJsonParams() {
		ksort($this->apiParas);
		if (!$this->apiParas) { // 空对象
			$this->apiParas = new stdClass ();
		}
		return json_encode($this->apiParas);
	}

	//返回接口名称
	public function getApiMethod() {
		return $this->ApiMethod;
	}

	//设置接口名称
	public function setApiMethod($ApiMethod) {
		$this->ApiMethod = $ApiMethod;
	}

	//设置接口参数
	public function setParas($key, $value) {
		$this->apiParas[$key] = $value;
		return $this;
	}

	//清理接口参数
	public function clear() {
		$this->ApiMethod = "";
		$this->apiParas = array();
	}

}
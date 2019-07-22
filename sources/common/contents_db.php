<?php
/*!
@file contents_db.php
@brief 
@copyright Copyright (c) 2017 Yamanoi Yasushi.
*/
//PDO接続初期化
require_once("pdointerface.php");

////////////////////////////////////
//以下、DBクラス使用例

//--------------------------------------------------------------------------------------
/// 都道府県クラス
//--------------------------------------------------------------------------------------
class cprefecture extends crecord {
    //--------------------------------------------------------------------------------------
    /*!
    @brief  コンストラクタ
    */
    //--------------------------------------------------------------------------------------
    public function __construct() {
        //親クラスのコンストラクタを呼ぶ
        parent::__construct();
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  すべての個数を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @return 個数
    */
    //--------------------------------------------------------------------------------------
    public function get_all_count($debug){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,                 //デバッグ文字を出力するかどうか
            "count(*)",             //取得するカラム
            "prefecture",           //取得するテーブル
            "1"                 //条件
        );
        if($row = $this->fetch_assoc()){
            //取得した個数を返す
            return $row['count(*)'];
        }
        else{
            return 0;
        }
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定された範囲の配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $from   抽出開始行
    @param[in]  $limit  抽出数
    @return 配列（2次元配列になる）
    */
    //--------------------------------------------------------------------------------------
    public function get_all($debug,$from,$limit){
        $arr = array();
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",            //取得するカラム
            "prefecture",   //取得するテーブル
            "1",            //条件
            "prefecture_id asc",    //並び替え
            "limit " . $from . "," . $limit     //抽出開始行と抽出数
        );
        //順次取り出す
        while($row = $this->fetch_assoc()){
            $arr[] = $row;
        }
        //取得した配列を返す
        return $arr;
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定されたIDの配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $id     ID
    @return 配列（1次元配列になる）空の場合はfalse
    */
    //--------------------------------------------------------------------------------------
    public function get_tgt($debug,$id){
        if(!cutil::is_number($id)
        ||  $id < 1){
            //falseを返す
            return false;
        }
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",            //取得するカラム
            "prefecture",   //取得するテーブル
            "prefecture_id=" . $id  //条件
        );
        return $this->fetch_assoc();
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  デストラクタ
    */
    //--------------------------------------------------------------------------------------
    public function __destruct(){
        //親クラスのデストラクタを呼ぶ
        parent::__destruct();
    }
}

//--------------------------------------------------------------------------------------
/// フルーツクラス
//--------------------------------------------------------------------------------------
class cfruits extends crecord {
    //--------------------------------------------------------------------------------------
    /*!
    @brief  コンストラクタ
    */
    //--------------------------------------------------------------------------------------
    public function __construct() {
        //親クラスのコンストラクタを呼ぶ
        parent::__construct();
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  すべての個数を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @return 個数
    */
    //--------------------------------------------------------------------------------------
    public function get_all_count($debug){
        return $this->get_all_count_core($debug,'fruits');
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定された範囲の配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @return 配列（2次元配列になる）
    */
    //--------------------------------------------------------------------------------------
    public function get_all($debug){
        return $this->get_alltable_core($debug,'fruits','fruits_id');
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定されたIDの配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $id     ID
    @return 配列（1次元配列になる）空の場合はfalse
    */
    //--------------------------------------------------------------------------------------
    public function get_tgt($debug,$id){
        return $this->get_tgt_core($debug,$id,'fruits','fruits_id');
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  デストラクタ
    */
    //--------------------------------------------------------------------------------------
    public function __destruct(){
        //親クラスのデストラクタを呼ぶ
        parent::__destruct();
    }
}

//--------------------------------------------------------------------------------------
/// メンバークラス
//--------------------------------------------------------------------------------------
class cmember extends crecord {
    //--------------------------------------------------------------------------------------
    /*!
    @brief  コンストラクタ
    */
    //--------------------------------------------------------------------------------------
    public function __construct() {
        //親クラスのコンストラクタを呼ぶ
        parent::__construct();
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  すべての個数を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @return 個数
    */
    //--------------------------------------------------------------------------------------
    public function get_all_count($debug){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,                 //デバッグ文字を出力するかどうか
            "count(*)",             //取得するカラム
            "member,prefecture",            //取得するテーブル
            "member.prefecture_id = prefecture.prefecture_id" //条件
        );
        if($row = $this->fetch_assoc()){
            //取得した個数を返す
            return $row['count(*)'];
        }
        else{
            return 0;
        }
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定された範囲の配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $from   抽出開始行
    @param[in]  $limit  抽出数
    @return 配列（2次元配列になる）
    */
    //--------------------------------------------------------------------------------------
    public function get_all($debug,$from,$limit){
        $arr = array();
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "member.*,prefecture.prefecture_name", //取得するカラム
            "member,prefecture",    //取得するテーブル
            "member.prefecture_id = prefecture.prefecture_id", //条件
            "member.member_id asc", //並び替え
            "limit " . $from . "," . $limit     //抽出開始行と抽出数
        );
        //順次取り出す
        while($row = $this->fetch_assoc()){
            $arr[] = $row;
        }
        //取得した配列を返す
        return $arr;
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定されたIDの配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $id     ID
    @return 配列（1次元配列になる）空の場合はfalse
    */
    //--------------------------------------------------------------------------------------
    public function get_tgt($debug,$id){
        if(!cutil::is_number($id)
        ||  $id < 1){
            //falseを返す
            return false;
        }
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "member.*,prefecture.prefecture_name",          //取得するカラム
            "member,prefecture",    //取得するテーブル
            "member.member_id ={$id} and 
member.prefecture_id = prefecture.prefecture_id"    //条件
        );
        return $this->fetch_assoc();
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  フルーツとのマッチする配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $id     ID
    @return 配列（1次元配列になる）
    */
    //--------------------------------------------------------------------------------------
    public function get_all_fruits_match($debug,$id){
        $arr = array();
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*", //取得するカラム
            "fruits_match", //取得するテーブル
            "member_id = {$id}", //条件
            "fruits_id asc" //並び替え
        );
        //順次取り出す
        while($row = $this->fetch_assoc()){
            $arr[] = $row['fruits_id'];
        }
        //取得した配列を返す
        return $arr;
    }

    //--------------------------------------------------------------------------------------
    /*!
    @brief  デストラクタ
    */
    //--------------------------------------------------------------------------------------
    public function __destruct(){
        //親クラスのデストラクタを呼ぶ
        parent::__destruct();
    }
}


//--------------------------------------------------------------------------------------
/// 管理者クラス
//--------------------------------------------------------------------------------------
class cadmin_master extends crecord {
    //--------------------------------------------------------------------------------------
    /*!
    @brief  コンストラクタ
    */
    //--------------------------------------------------------------------------------------
    public function __construct() {
        //親クラスのコンストラクタを呼ぶ
        parent::__construct();
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  すべての個数を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @return 個数
    */
    //--------------------------------------------------------------------------------------
    public function get_all_count($debug){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,                 //デバッグ文字を出力するかどうか
            "count(*)",             //取得するカラム
            "admin_master",            //取得するテーブル
            "1" //条件
        );
        if($row = $this->fetch_assoc()){
            //取得した個数を返す
            return $row['count(*)'];
        }
        else{
            return 0;
        }
	}
	
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定された範囲の配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $from   抽出開始行
    @param[in]  $limit  抽出数
    @return 配列（2次元配列になる）
    */
    //--------------------------------------------------------------------------------------
    public function get_all($debug,$from,$limit){
        $arr = array();
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*", //取得するカラム
            "admin_master",    //取得するテーブル
            "1", //条件
            "admin_master_id asc", //並び替え
            "limit " . $from . "," . $limit     //抽出開始行と抽出数
        );
        //順次取り出す
        while($row = $this->fetch_assoc()){
            $arr[] = $row;
        }
        //取得した配列を返す
        return $arr;
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定されたログインの配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $id     ログイン
    @return 配列（1次元配列になる）空の場合はfalse
    */
    //--------------------------------------------------------------------------------------
    public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "admin_master",    //取得するテーブル
            "admin_login like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  指定されたIDの配列を得る
    @param[in]  $debug  デバッグ出力をするかどうか
    @param[in]  $id     ID
    @return 配列（1次元配列になる）空の場合はfalse
    */
    //--------------------------------------------------------------------------------------
    public function get_tgt_id($debug,$id){
        if(!cutil::is_number($id)
            ||  $id < 1){
            //falseを返す
            return false;
        }
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select($debug,
            "*",
            "admin_master",
            "admin_master_id = " . $id );
        return $this->fetch_assoc();
    }
    //--------------------------------------------------------------------------------------
    /*!
    @brief  デストラクタ
    */
    //--------------------------------------------------------------------------------------
    public function __destruct(){
        //親クラスのデストラクタを呼ぶ
        parent::__destruct();
    }
}

//--------------------------------------------------------------------------------------
///	商品Hクラス(開発用)
//--------------------------------------------------------------------------------------
class cproductH extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"productH",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"productH",	//取得するテーブル
			"1",			//条件
			"product_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
     //--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
    @param[in]	$limit	抽出数
    @param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
    public function get_all_order($debug,$from,$limit,$conditions,$tgt_genre,$tgt_culmn,$tgt_category){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"productH",	//取得するテーブル
			"product_category=" .$tgt_category." and "
			 .$conditions .$tgt_genre,	//条件
			$tgt_culmn,	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	public function get_all_genre_count($debug,$conditions,$tgt_genre){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"count(*)",			//取得するカラム
			"productH",	//取得するテーブル
			$conditions .$tgt_genre			//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	public function get_all_category_genre_count($debug,$conditions,$tgt_genre,$tgt_category){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"count(*)",			//取得するカラム
			"productH",	//取得するテーブル
			"product_category=" .$tgt_category." and "
			 .$conditions .$tgt_genre		//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}

	public function get_tgt_order($debug,$from,$limit,$conditions,$sort,$tgt_category){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"productH",	//取得するテーブル
			"product_category=" .$tgt_category." and "
			 .$conditions,	//条件
			$sort,	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	public function get_tgt_genre_count($debug,$conditions,$tgt_genre){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"count(*)",			//取得するカラム
			"productH",	//取得するテーブル
			$conditions			//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	public function get_tgt_category_genre_count($debug,$conditions,$tgt_category){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"count(*)",			//取得するカラム
			"productH",	//取得するテーブル
			"product_category=" .$tgt_category." and "
			 .$conditions		//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
    
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	public function get_tgt($debug,$id){
		if(!cutil::is_number($id)
		||  $id < 1){
			//falseを返す
			return false;
		}
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"productH",	//取得するテーブル
			"product_id=" . $id	//条件
		);
		return $this->fetch_assoc();
    }
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}


//--------------------------------------------------------------------------------------
///	顧客クラス(開発用)
//--------------------------------------------------------------------------------------
class ccustomer extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"customer",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_count_mailaddress($debug,$id){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"customer",			//取得するテーブル
			"customer_email = '{$id}'"    //条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"customer",	//取得するテーブル
			"1",			//条件
			"customer_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "customer",    //取得するテーブル
            "customer_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt_mail($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "customer",    //取得するテーブル
            "customer_email = '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	評価クラス(開発用)
//--------------------------------------------------------------------------------------
class cassessment extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"assessment",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"assessment",	//取得するテーブル
			"1",			//条件
			"customer_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	
	//--------------------------------------------------------------------------------------
	public function get_allH($debug,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"assessment",	//取得するテーブル
			"customer_id like '{$id}'",	//条件
			"customer_id asc"	//並び替え
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//--------------------------------------------------------------------------------------
	public function get_alldetail($debug,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"assessment",	//取得するテーブル
			"customer_id = '{$id}'",	//条件
			"customer_id asc"	//並び替え
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "assessment",    //取得するテーブル
            "customer_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	取引情報クラス(開発用)
//--------------------------------------------------------------------------------------
class ctransaction_info extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"transaction_info",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"transaction_info",	//取得するテーブル
			"1",			//条件
			"transaction_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}

	public function get_allH($debug,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"transaction_info",	//取得するテーブル
			"customer_id = '{$id}'"			//条件
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "transaction_info",    //取得するテーブル
            "transaction_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	レビュークラス(開発用)
//--------------------------------------------------------------------------------------
class creview extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"review",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"review",	//取得するテーブル
			"1",			//条件
			"transaction_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "review",    //取得するテーブル
            "transaction_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}

	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt_product_id($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "review",    //取得するテーブル
            "product_id = '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}

	public function get_all_product_id($debug,$id){
		$arr = array();
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "review",    //取得するテーブル
			"product_id = '{$id}'"    //条件
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}


	public function get_tgtH($debug,$traid,$proid ){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "review",    //取得するテーブル
            "transaction_id = '{$traid}' AND product_id = '{$proid}'",    //条件
			"transaction_id asc"	//並び替え
		);
        return $this->fetch_assoc();
	}
	public function get_allH($debug){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "review",    //取得するテーブル
            "1",			//条件
			"transaction_id asc"
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	public function get_tgt_category_keyword($debug,$conditions,$from,$limit){
		//親クラスのselect()メンバ関数を呼ぶ
			$arr = array();
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
			"(review inner join productH on
			 review.product_id = productH.product_id)
			 inner join transaction_info on
			 review.transaction_id = transaction_info.transaction_id",    //取得するテーブル
            "$conditions",    //条件
			"review.transaction_id asc",
			"limit " . $from . "," . $limit	//並び替え
		);
        //順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	public function get_tgt_category_keyword_count($debug,$conditions){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"review inner join productH on
			 review.product_id = productH.product_id",    //取得するテーブル
            "$conditions"			//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	
	
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	秘密の質問クラス(開発用)
//--------------------------------------------------------------------------------------
class csecret_question extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"secret_question",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"secret_question",	//取得するテーブル
			"1",			//条件
			"customer_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "secret_question",    //取得するテーブル
            "customer_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	取引明細クラス(開発用)
//--------------------------------------------------------------------------------------
class ctransaction_details extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"transaction_details",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"transaction_details",	//取得するテーブル
			"1",			//条件
			"transaction_detail_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	
	//全部持ってくる
	public function get_allH($debug,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"transaction_details",	//取得するテーブル
			"transaction_id = '{$id}'"			//条件
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "transaction_details",    //取得するテーブル
            "transaction_detail_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	ジャンルクラス(開発用)
//--------------------------------------------------------------------------------------
class cgenre extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"genre",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"genre",	//取得するテーブル
			"1",			//条件
			"genre_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	public function get_allH($debug){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"genre",	//取得するテーブル
			"1",			//条件
			"genre_id asc"	//並び替え
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "genre",    //取得するテーブル
            "genre_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}
//--------------------------------------------------------------------------------------
///	管理者クラス(開発用)
//--------------------------------------------------------------------------------------
class cadmin extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"admin",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"admin",	//取得するテーブル
			"1",			//条件
			"auth_adm_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "admin",    //取得するテーブル
            "auth_adm_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	public function get_tgt_count($debug,$flag){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"admin",			//取得するテーブル
			"$flag"			//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	public function get_all_admin($debug,$flag,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"admin",	//取得するテーブル
		    "$flag",			//条件
			"adm_created_date asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	ブラックリストクラス(開発用)
//--------------------------------------------------------------------------------------
class cblack_list extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"black_list",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"black_list",	//取得するテーブル
			"1",			//条件
			"customer_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "black_list",    //取得するテーブル
            "customer_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}
//--------------------------------------------------------------------------------------
///	カートクラス(開発用)
//--------------------------------------------------------------------------------------
class ccart extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"cart",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"cart",	//取得するテーブル
			"1",			//条件
			"customer_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "cart",    //取得するテーブル
            "customer_id = '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	//全部持ってくる
	public function get_allH($debug,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"cart",	//取得するテーブル
			"customer_id = '{$id}'"			//条件
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}

	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	お問い合わせクラス(開発用)
//--------------------------------------------------------------------------------------
class ccontact extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"contact",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	public function get_tgt_count($debug,$flag){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"contact",			//取得するテーブル
			"$flag"			//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"contact",	//取得するテーブル
			"1",			//条件
			"contact_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	public function get_all_reply($debug,$flag,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"contact",	//取得するテーブル
		    "$flag",			//条件
			"contact_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "contact",    //取得するテーブル
            "contact_id = '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
   
	
	//--------------------------------------------------------------------------------------
	/*
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	レンタルクラス(開発用)消さないで
//--------------------------------------------------------------------------------------
class crental extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(distinct info.customer_id)",				//取得するカラム
			"(transaction_info as info
			 inner join customer
			 on info.customer_id = customer.customer_id)
			 inner join transaction_details as details
			 on info.transaction_id = details.transaction_id",	//取得するテーブル
			"details.transaction_category = 2"
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(distinct info.customer_id)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"rental",	//取得するテーブル
			"1",			//条件
			"transaction_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	public function get_all_customer($debug,$from,$limit,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,
			"*",			//取得するカラム
			"(transaction_info as info
			 inner join transaction_details as details
			 on info.transaction_id = details.transaction_id)
			 inner join productH
			 on details.product_id = productH.product_id",	//取得するテーブル
			"details.transaction_category = 2 and
			 info.customer_id = '$id'",			//条件
			"info.transaction_id asc",	//並び替え
			"limit " . $from . "," . $limit
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	public function get_all_info($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"distinct info.customer_id,customer_email",			//取得するカラム
			"(transaction_info as info
			 inner join customer
			 on info.customer_id = customer.customer_id)
			 inner join transaction_details as details
			 on info.transaction_id = details.transaction_id",	//取得するテーブル
			"details.transaction_category = 2",			//条件
			"info.transaction_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "rental",    //取得するテーブル
            "transaction_id like '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	いいねクラス(開発用)
//--------------------------------------------------------------------------------------
class cfavorite extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"favorite",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"favorite",	//取得するテーブル
			"1",			//条件
			"favorite_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	public function get_allH($debug,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"favorite",	//取得するテーブル
			"customer_id = '{$id}'", //条件
			"favorite_id asc"	//並び替え
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "favorite",    //取得するテーブル
            "favorite = '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
// フリマ商品クラス(開発用)
//--------------------------------------------------------------------------------------
class cfrima_productH extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"frima_productH",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug,$from,$limit){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"frima_productH",	//取得するテーブル
			"1",			//条件
			"frima_product_id asc",	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
   
	//出品者が自分の者のみ全件出力
	public function get_allex($debug,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"frima_productH",	//取得するテーブル
			"ex_user = '{$id}'", //条件
			"frima_product_id asc"	//並び替え
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}

	//購入者が自分の者のみ全件出力
	public function get_allbuy($debug,$id){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"frima_productH",	//取得するテーブル
			"buy_user = '{$id}'", //条件
			"favorite_id asc"	//並び替え
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "frima_productH",    //取得するテーブル
            "frima_product_id = '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}

	public function get_tgt_category_genre_count($debug,$conditions,$tgt_category){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"count(*)",			//取得するカラム
			"frima_productH",	//取得するテーブル
			$conditions		//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}

	public function get_tgt_order($debug,$from,$limit,$conditions,$sort,$tgt_category){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"frima_productH",	//取得するテーブル
			 $conditions,	//条件
			$sort,	//並び替え
			"limit " . $from . "," . $limit		//抽出開始行と抽出数
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}

//--------------------------------------------------------------------------------------
///	ラインクラス(開発用)
//--------------------------------------------------------------------------------------
class cLINE extends crecord {
	//--------------------------------------------------------------------------------------
	/*!
	@brief	コンストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __construct() {
		//親クラスのコンストラクタを呼ぶ
		parent::__construct();
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	すべての個数を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@return	個数
	*/
	//--------------------------------------------------------------------------------------
	public function get_all_count($debug){
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,					//デバッグ文字を出力するかどうか
			"count(*)",				//取得するカラム
			"LINE",			//取得するテーブル
			"1"					//条件
		);
		if($row = $this->fetch_assoc()){
			//取得した個数を返す
			return $row['count(*)'];
		}
		else{
			return 0;
		}
	}
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定された範囲の配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$from	抽出開始行
	@param[in]	$limit	抽出数
	@return	配列（2次元配列になる）
	*/
	//--------------------------------------------------------------------------------------
	public function get_all($debug){
		$arr = array();
		//親クラスのselect()メンバ関数を呼ぶ
		$this->select(
			$debug,			//デバッグ表示するかどうか
			"*",			//取得するカラム
			"LINE",	//取得するテーブル
			"1",			//条件
			"LINE_id asc"	//並び替え
			
		);
		//順次取り出す
		while($row = $this->fetch_assoc()){
			$arr[] = $row;
		}
		//取得した配列を返す
		return $arr;
    }
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	指定されたIDの配列を得る
	@param[in]	$debug	デバッグ出力をするかどうか
	@param[in]	$id		ID
	@return	配列（1次元配列になる）空の場合はfalse
	*/
	//--------------------------------------------------------------------------------------
	
	public function get_tgt($debug,$id){
        //親クラスのselect()メンバ関数を呼ぶ
        $this->select(
            $debug,         //デバッグ表示するかどうか
            "*",          //取得するカラム
            "LINE",    //取得するテーブル
            "LINE_id = '{$id}'"    //条件
        );
        return $this->fetch_assoc();
	}
	
	//--------------------------------------------------------------------------------------
	/*!
	@brief	デストラクタ
	*/
	//--------------------------------------------------------------------------------------
	public function __destruct(){
		//親クラスのデストラクタを呼ぶ
		parent::__destruct();
	}
}
?>

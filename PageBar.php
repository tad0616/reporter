<?php

function getPageBar($sql = "", $show_num = 20, $page_list = 10, $to_page = "", $url_other = "")
{
    global $db;
    //die('PHP_SELF:'.$_SERVER['PHP_SELF']);
    if (empty($show_num)) {
        $show_num = 20;
    }

    if (empty($page_list)) {
        $page_list = 10;
    }

    $result = $db->query($sql) or die($db->connect_error);
    $total  = $result->num_rows;

    $navbar = new PageBar($total, $show_num, $page_list);

    if (!empty($to_page)) {
        $navbar->set_to_page($to_page);
    }

    if (!empty($url_other)) {
        $navbar->set_url_other($url_other);
    }

    $mybar       = $navbar->makeBar();
    $main['bar'] = "
        <nav aria-label='Page navigation example'>
            <ul class='pagination justify-content-center'>
            {$mybar['left']}
            {$mybar['center']}
            {$mybar['right']}
            </ul>
        </nav>
      ";

    $main['sql']   = $sql . $mybar['sql'];
    $main['total'] = $total;

    return $main;
}

class PageBar
{
    // 目前所在頁碼
    public $current;
    // 所有的資料數量 (rows)
    public $total;
    // 每頁顯示幾筆資料
    public $limit = 10;
    // 目前在第幾層的頁數選項？
    public $pCurrent;
    // 總共分成幾頁？
    public $pTotal;
    // 每一層最多有幾個頁數選項可供選擇，如：3 = {[1][2][3]}
    public $pLimit;

    // 要使用的 URL 頁數參數名？
    public $url_page = "g2p";
    // 會使用到的 URL 變數名，給 process_query() 過濾用的。
    public $used_query = array();
    // 目前頁數顏色
    public $act_color = "#990000";
    public $query_str; // 存放 URL 參數列
    //指定頁面
    public $to_page;
    //其他連結參數
    public $url_other;

    public function __construct($total, $limit = 10, $page_limit)
    {
        $limit = intval($limit);
        //die(var_export($limit));
        $mydirname     = basename(dirname(__FILE__));
        $this->to_page = $_SERVER['PHP_SELF'];
        $this->limit   = $limit;
        $this->total   = $total;
        $this->pLimit  = $page_limit;
    }

    public function init()
    {
        $this->used_query = array($this->url_page);
        $this->query_str  = $this->processQuery($this->used_query);
        $this->glue       = ($this->query_str == "") ? '?' : '&';

        $this->current = (isset($_GET[$this->url_page])) ? intval($_GET[$this->url_page]) : 1;
        if ($this->current < 1) {
            $this->current = 1;
        }

        $this->pTotal   = ceil($this->total / $this->limit);
        $this->pCurrent = ceil($this->current / $this->pLimit);
    }

    // 處理 URL 的參數，過濾會使用到的變數名稱
    public function processQuery($used_query)
    {
        // 將 URL 字串分離成二維陣列
        $QUERY_STRING = htmlspecialchars($_SERVER['QUERY_STRING']);
        $vars         = explode("&", $QUERY_STRING);
        //die(var_export($vars));
        for ($i = 0; $i < count($vars); $i++) {
            if (substr($vars[$i], 0, 7) == "amp;g2p") {
                continue;
            }

            //echo substr($vars[$i],0,7)."<br>";
            $var[$i] = explode("=", $vars[$i]);
        }

        // 過濾要使用的 URL 變數名稱
        for ($i = 0; $i < count($var); $i++) {
            for ($j = 0; $j < count($used_query); $j++) {
                if (isset($var[$i][0]) && $var[$i][0] == $used_query[$j]) {
                    $var[$i] = array();
                }

            }
        }

        $vars = "";
        // 合併變數名與變數值
        for ($i = 0; $i < count($var); $i++) {
            $vars[$i] = implode("=", $var[$i]);
        }

        // 合併為一完整的 URL 字串
        $processed_query = "";
        for ($i = 0; $i < count($vars); $i++) {
            $glue = ($processed_query == "") ? '?' : '&';
            // 開頭第一個是 '?' 其餘的才是 '&'
            if ($vars[$i] != "") {
                $processed_query .= $glue . $vars[$i];
            }

        }
        return $processed_query;
    }

    // 製作 sql 的 query 字串 (LIMIT)
    public function sqlQuery()
    {
        $row_start = ($this->current * $this->limit) - $this->limit;
        $sql_query = " LIMIT {$row_start}, {$this->limit}";
        return $sql_query;
    }

    public function set_to_page($page = "")
    {
        $this->to_page = $page;
    }

    public function set_url_other($other = "")
    {
        $this->url_other = $other;
    }

    // 製作 bar
    public function makeBar($url_page = "none")
    {
        if ($url_page != "none") {
            $this->url_page = $url_page;
        }
        $this->init();

        // 取得目前時間
        $loadtime = $this->url_other;

        // 取得目前頁框(層)的第一個頁數啟始值，如 6 7 8 9 10 = 6
        $i = ($this->pCurrent * $this->pLimit) - ($this->pLimit - 1);

        $bar_center = "";
        while ($i <= $this->pTotal && $i <= ($this->pCurrent * $this->pLimit)) {
            if ($i == $this->current) {
                $bar_center = "
                  {$bar_center}
                  <li class='page-item active'>
                    <a href='{$this->to_page}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}'  class='page-link' title='{$i}'>{$i}<span class='sr-only'>(current)</span></a>
                  </li>";
            } else {
                $bar_center .= "
                  <li class='page-item'>
                    <a href='{$this->to_page}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}'  class='page-link' title='{$i}'>{$i}</a>
                  </li>";
            }
            $i++;
        }
        $bar_center = $bar_center . "";

        // 往前跳一頁
        if ($this->current <= 1) {
            //$bar_left=$bar_first="";
            $bar_left  = "<li class='page-item disabled'><a href='#' class='page-link'>&lsaquo;</a></li>";
            $bar_first = "<li class='page-item disabled'><a href='#' class='page-link'>&laquo;</a></li>";
        } else {
            $i         = $this->current - 1;
            $bar_left  = "<li class='page-item'><a href='{$this->to_page}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}'  class='page-link' title='回上頁'>&lsaquo;</a></li>";
            $bar_first = "<li class='page-item'><a href='{$this->to_page}{$this->query_str}{$this->glue}{$this->url_page}=1{$loadtime}'  class='page-link' title='回第一頁' >&laquo;</a></li>";
        }

        // 往後跳一頁
        if ($this->current >= $this->pTotal) {
            //$bar_right=$bar_last="";
            $bar_right = "<li class='page-item disabled'><a href='#' class='page-link'>&rsaquo;</a></li>";
            $bar_last  = "<li class='page-item disabled'><a href='#' class='page-link'>&raquo;</a></li>";
        } else {
            $i         = $this->current + 1;
            $bar_right = "<li class='page-item'><a href='{$this->to_page}{$this->query_str}{$this->glue}{$this->url_page}={$i}{$loadtime}' class='page-link' title='下一頁'>&rsaquo;</a></li>";
            $bar_last  = "<li class='page-item'><a href='{$this->to_page}{$this->query_str}{$this->glue}{$this->url_page}={$this->pTotal}{$loadtime}' class='page-link' title='上一頁' >&raquo;</a></li>";
        }

        // 往前跳一整個頁框(層)
        if (($this->current - $this->pLimit) < 1) {
            $bar_l = "";
        } else {
            $i     = $this->current - $this->pLimit;
            $bar_l = "";
        }

        //往後跳一整個頁框(層)
        if (($this->current + $this->pLimit) > $this->pTotal) {
            $bar_r = "";
        } else {
            $i     = $this->current + $this->pLimit;
            $bar_r = "";
        }

        $page_bar['center']  = $bar_center;
        $page_bar['left']    = $bar_first . $bar_l . $bar_left;
        $page_bar['right']   = $bar_right . $bar_r . $bar_last;
        $page_bar['current'] = $this->current;
        $page_bar['total']   = $this->pTotal;
        $page_bar['sql']     = $this->sqlQuery();
        return $page_bar;
    }
}

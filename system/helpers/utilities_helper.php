<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

if (!function_exists('main_site_url')) {
    /**
     *
     *    [my_url Return site theme url]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       string        $uri      [description]
     *    @param       [type]        $protocol [description]
     *    @return      [type]                  [description]
     */
    function main_site_url($uri = '', $protocol = null)
    {
        $site_name = '';
        if (!empty(get_instance()->config->config['main_site_url'])) {
            $site_name = get_instance()->config->config['main_site_url'].$uri;
        } else {
            $site_name = get_instance()->config->site_url("/" . $uri, $protocol);
        }
        
        return $site_name;
    }
}

if (!function_exists('theme_url')) {
    /**
     *
     *    [theme_url Return site theme url]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       string        $uri      [description]
     *    @param       [type]        $protocol [description]
     *    @return      [type]                  [description]
     */
    function theme_url($uri = '', $protocol = null)
    {
    	return get_instance()->config->site_url("assets/theme/notebook/" . $uri, $protocol);
    }
}

if (!function_exists('assets_url')) {
    /**
     *    [assets_url Return application assets url]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       string        $uri      [description]
     *    @param       [type]        $protocol [description]
     *    @return      [type]                  [description]
     */
    function assets_url($uri = '', $protocol = null)
    {
    	return get_instance()->config->site_url("assets/" . $uri, $protocol);
    }
}

if (!function_exists('api_url')) {
    /**
     *    [api_url description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-14
     *    @description [description]
     *    @param       string        $uri      [description]
     *    @param       [type]        $protocol [description]
     *    @return      [type]                  [description]
     */
    function api_url($uri = '', $protocol = null)
    {
    	return get_instance()->config->item('api_url') . (strpos($uri, '/') === 0 ? $uri : '/' . $uri);
    }
}

if (!function_exists('to_date_string')) {
    /**
     *    [to_date_string Return date string from date format 'Y-m-d' or datetime format 'Y-m-d H:i:s' to 'dd/mm/YYYY']
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $d       [input stringdate format 'Y-m-d' or datetime format 'Y-m-d H:i:s' to 'dd/mm/YYYY']
     *    @param       string        $culture [description]
     *    @return      [type]                 [description]
     */
    function to_date_string($d, $culture = 'thai')
    {
    	if (empty($d)) {
    		return '';
    	}

    	$d = strtotime($d);
    	if ($culture == 'thai') {
    		$dm = date('d/m', $d);
    		$y  = date('Y', $d) + 543;
    		return $dm . '/' . $y;
    	} else {
    		return date('d/m/Y', $d);
    	}

    }
}

if (!function_exists('to_date_string_op')) {
    /**
     *    [to_date_string_op Return date string from date format 'Y-m-d' or datetime format 'Y-m-d H:i:s' to 'dd/mm/YYYY']
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $d       [input stringdate format 'Y-m-d' or datetime format 'Y-m-d H:i:s' to 'dd/mm/YYYY']
     *    @param       string        $culture [description]
     *    @return      [type]                 [description]
     */
    function to_date_string_op($d, $culture = 'thai')
    {
        if (empty($d)) {
            return '';
        }

        $d = strtotime($d);
        if ($culture == 'thai') {
            $dm = date('d/m', $d);
            $y  = date('Y', $d) + 543;
            return $dm . '/' . $y;
        } else {
            return date('d-m-Y', $d);
        }

    }
}

if (!function_exists('to_datetime_string')) {
    /**
     *    [to_datetime_string Return date string from date format 'Y-m-d' or datetime format 'Y-m-d H:i:s' to 'dd/mm/YYYY H:i:s' ]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $d       [input stringdate format 'Y-m-d' or datetime format 'Y-m-d H:i:s' to 'dd/mm/YYYY']
     *    @param       string        $culture [culture code default 'th']
     *    @return      [type]                 [datetime string format 'd/m/Y H:i:s']
     */
    function to_datetime_string($d, $culture = 'thai', $f = '')
    {
    	if (empty($d)) {
    		return '';
    	}

    	$d = strtotime($d);
    	if ($culture == 'thai') {
    		$dm = date('d/m', $d);
    		$y  = date('Y', $d) + 543;
            if ($f != '') {
                return $dm . '/' . $y . ' ' . date($f, $d);
            } else {
                return $dm . '/' . $y . ' ' . date('H:i:s', $d);
            }	
        } else {
          return date('d/m/Y H:i:s', $d);
      }

  }
}

if (!function_exists('to_time_string')) {
    /**
     *    [to_time_string Return time string from date format 'Y-m-d' or datetime format 'Y-m-d H:i:s' to 'dd/mm/YYYY H:i:s']
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $d [input stringdate format 'Y-m-d' or datetime format 'Y-m-d H:i:s' to 'dd/mm/YYYY']
     *    @param       string        $f [time fromat default 'H.i']
     *    @return      [type]           [time string format 'H:i']
     */
    function to_time_string($d, $f = 'H.i')
    {
    	if (empty($d)) {
    		return '';
    	}

    	$d = strtotime($d);
    	return date($f, $d);
    }
}

if (!function_exists('convert_to_date')) {
    /**
     *    [convert_to_date Return date string format 'Y-m-d' form input date string format 'd/m/Y']
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $str     [input date string format 'd/m/Y']
     *    @param       string        $m       [input delimiter default '/']
     *    @param       string        $p       [output delimiter default '-' ]
     *    @param       string        $culture [culture default 'th']
     *    @return      [type]                 [description]
     */
    function convert_to_date($str, $culture = 'thai')
    {

    	$m = '/';
    	$p = '-';
    	if (empty($str)) {
    		return null;
    	}

    	$explose_str = explode($m, $str);

    	if (count($explose_str) != 3) {
    		$explose_str = explode($p, $str);
    		if (count($explose_str) == 3) {
    			return $str;
    		}
    		return null;
    	}

    	$d = $explose_str[0];
    	$m = $explose_str[1];
    	$y = $explose_str[2];

    	if (strlen($y) != 4) {
    		return null;
    	}

    	if ($culture == 'thai') {
    		$y = $y - 543;
    	}
    	return $y . '-' . $m . '-' . $d;

    }
}

if (!function_exists('convert_to_datetime')) {
    /**
     *    [convert_to_date Return date string format 'Y-m-d' form input date string format 'd/m/Y']
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $str     [input date string format 'd/m/Y']
     *    @param       string        $m       [input delimiter default '/']
     *    @param       string        $p       [output delimiter default '-' ]
     *    @param       string        $culture [culture default 'th']
     *    @return      [type]                 [description]
     */
    function convert_to_datetime($str, $culture = 'thai')
    {
    	if (empty($str)) {
    		return null;
    	}

    	$date               = '';
    	$time               = '00:00:00';
    	$datetime_component = explode(' ', $str);
    	if (count($datetime_component) == 2) {
    		$date = $datetime_component[0];
    		$time = $datetime_component[1];

    	} elseif (count($datetime_component) == 1) {
    		$date = $str;
    	} else {
    		return null;
    	}

    	$m = '/';
    	$p = '-';

    	$explose_str = explode($m, $date);

    	if (count($explose_str) != 3) {
    		$explose_str = explode($p, $date);
    		if (count($explose_str) == 3) {
    			return $date . ' ' . $time;
    		}
    		return null;
    	}

    	$d = $explose_str[0];
    	$m = $explose_str[1];
    	$y = $explose_str[2];

    	if (strlen($y) != 4) {
    		return null;
    	}

    	if ($culture == 'thai') {
    		$y = $y - 543;
    	}
    	return $y . '-' . $m . '-' . $d . ' ' . $time;

    }
}

/* =============================== End Date helper ===========================*/

if (!function_exists('to_int_string')) {
    /**
     *    [to_int_string Return string integer format ]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $n [number]
     *    @param       boolean       $r [return if null]
     *    @return      [type]           [string number format]
     */
    function to_int_string($n, $r = true)
    {
    	return to_number_string($n, 0, $r);
    }
}

if (!function_exists('to_number_string')) {
    /**
     *    [to_number_string Return string number format]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $n [description]
     *    @param       integer       $d [description]
     *    @param       boolean       $r [description]
     *    @return      [type]           [description]
     */
    function to_number_string($n, $d = 2, $r = true)
    {
    	if (empty($n)) {
    		if (!$r) {
    			return $r;
    		}
    		$n = 0;
    	}
    	return number_format($n, $d);

    }
}

if (!function_exists('get_date_string')) {
    /**
     *    [to_number_string Return string number format]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $n [description]
     *    @param       integer       $d [description]
     *    @param       boolean       $r [description]
     *    @return      [type]           [description]
     */
    function get_date_string()
    {
    	return to_date_string(get_current_date());
    }
}

/* =============================== End Number helper ===========================*/

if (!function_exists('get_dropdown_options')) {
    /**
     *    [get_dropdown_options Return array of options key=>value]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [array]        $result_array     [array of table data]
     *    @param       string        $data_value_field [column name from datasource to get value to result key.]
     *    @param       string        $data_text_field  [column name from datasource to get value to  result value.]
     *    @param       array         $first_option     [array (key=>value)]
     *    @return      [array]                          [array(0 => array (key=>value))]
     */
    function get_dropdown_options($result_array, $data_value_field = 'id', $data_text_field = 'title', $first_option = array())
    {
    	$options = array();
    	foreach ($result_array as $key => $value) {
    		$text_columns = explode(',', $data_text_field);
    		if (count($text_columns) > 1) {
    			$text = '';
    			foreach ($text_columns as $text_column) {
    				if (empty($text)) {
    					$text .= $value[$text_column];
    				} else {
    					$text .= ' - ' . $value[$text_column];
    				}
    			}
    			$options[$value[$data_value_field]] = $text;
    		} else {
    			$options[$value[$data_value_field]] = $value[$data_text_field];
    		}
    	}
    	if (!empty($first_option)) {
    		$options = $first_option + $options;
    	}
    	return $options;
    }

}

/* Return thai number characters*/
if (!function_exists('thainumDigit')) {
	function thainumDigit($subject)
	{
		$search  = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
		$replace = array("o", "๑", "๒", "๓", "๔", "๕", "๖", "๗", "๘", "๙");
		return str_replace($search, $replace, $subject);
	}

}

/* array of months in Thai character.*/
if (!function_exists('get_month_options')) {
	function get_month_options()
	{
		$month_options = array(
			'01' => 'มกราคม'
			, '02' => 'กุมภาพันธ์'
			, '03' => 'มีนาคม'
			, '04' => 'เมษายน'
			, '05' => 'พฤษภาคม'
			, '06' => 'มิถุนายน'
			, '07' => 'กรกฏาคม'
			, '08' => 'สิงหาคม'
			, '09' => 'กันยายน'
			, '10' => 'ตุลาคม'
			, '11' => 'พฤศจิกายน'
			, '12' => 'ธันวาคม',
		);
		return $month_options;
	}

}

if (!function_exists('get_current_datetime')) {
    /**
     *    [get_current_datetime Return current datetime format 'Y-m-d H:i:s']
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @return      [string]        [date format 'Y-m-d H:i:s']
     */
    function get_current_datetime()
    {
    	return date('Y-m-d H:i:s', time());
    }

}

if (!function_exists('get_current_date')) {
    /**
     *    [get_current_date Return current datetime format 'Y-m-d ]]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @return      [string]        [date format 'Y-m-d']
     */
    function get_current_date()
    {
    	return date('Y-m-d', time());
    }

}

/* =============================== Button Helper ===========================*/

if (!function_exists('button_edit')) {
    /**
     *    [button_edit Return string button edit]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [url]
     *    @return      [string]                 [string button edit]
     */
    function button_edit($options = array())
    {
    	$url      = '';
    	$is_write = true;
    	$modal_id = null;

    	$href             = 'href="javascript:void(0)"';
    	$modal_attributes = '';
    	$icon             = '<i class="fa fa-pencil"></i>';
    	$class            = 'class="btn btn btn-md btn-icon btn-success"';

    	if (is_array($options)) {
    		extract($options);
    	} else {
    		$url = $options;
    	}

    	if (isset($modal_id)) {
    		$modal_attributes = 'data-toggle="modal" data-target="#' . $modal_id . '"';
    	} else {
    		$href = 'href="' . $url . '"';
    	}

    	if (!$is_write) {
    		$icon = '<i class="fa fa-eye"></i>';
    	}

    	return '<a ' . $href . ' ' . $class . ' ' . $modal_attributes . '>' . $icon . '</a>';
    }
}

if (!function_exists('button_delete')) {
    /**
     *    [button_delete Return string button delete]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [id, $is_write]
     *    @return      [string]                 [description]
     */
    function button_delete($options = array())
    {
    	$data_id  = "btn_delete";
    	$is_write = true;

    	if (is_array($options)) {
    		extract($options);
    	} else {
    		$data_id = $options;
    	}

    	return '<a href="javascript:void(0)" class="btn btn-md btn-icon btn-danger btn-delete" data-id="' . $data_id . '" ' . (!$is_write ? 'disabled = "disabled"' : '') . '><i class="fa fa-trash-o"></i></a>';
    }
}

if (!function_exists('button_save')) {
    /**
     *    [button_save ]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [$id, $is_write]
     *    @return      [type]                 [description]
     */
    function button_save($options = array())
    {
    	$id       = "btn_save";
    	$is_write = true;

    	if (is_array($options)) {
    		extract($options);
    	} else {
    		$id = $options;
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-primary btn-save" id="' . $id . '" ' . (!$is_write ? 'disabled = "disabled"' : '') . '><i class="fa fa-floppy-o"></i> ' . lang('btn_save') . '</a>';
    }
}

if (!function_exists('button_close_modal')) {
    /**
     *    [button_close_modal ]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [$id, $is_write]
     *    @return      [type]                 [description]
     */
    function button_close_modal($options = array())
    {
    	$id       = "button_close_modal";
    	$is_write = true;

    	if (is_array($options)) {
    		extract($options);
    	} else {
    		$id = $options;
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-default btn-close-modal" data-dismiss="modal"><i class="fa fa-times"></i> ' . lang('btn_cancel') . '</a>';
    }
}

if (!function_exists('button_search')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search($options = array())
    {

    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" id="btn_search" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}

if (!function_exists('button_search_capacity')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search_capacity($options = array())
    {

    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" id="btn_search_capacity" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}

if (!function_exists('button_search_behavior')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search_behavior($options = array())
    {

    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" id="btn_search_behavior" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}

if (!function_exists('button_search_service')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search_service($options = array())
    {

    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" id="btn_search_service" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}

if (!function_exists('button_search_organize')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search_organize($options = array())
    {

    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" id="btn_search_organize" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}

if (!function_exists('button_search_employer')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search_employer($options = array())
    {

    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" id="btn_search_employer" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}

if (!function_exists('button_search_staff')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search_staff($options = array())
    {

    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" id="btn_search_staff" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}

if (!function_exists('button_search_jobposition')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search_jobposition($options = array())
    {

    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" id="btn_search_jobposition" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}


if (!function_exists('button_search_filter_modal')) {
    /**
     *    [button_search description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_search_filter_modal($options = array())
    {

        if (is_array($options)) {
            extract($options);
        }

        return '<a href="javascript:void(0)" class="btn btn-s-md btn-pink btn-search" onclick="searchDatatableList()" title="' . lang('btn_search') . '"><i class="fa fa-search"></i> ' . lang('btn_search') . '</a>';
    }
}

if (!function_exists('button_new')) {
    /**
     *    [button_new description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $options [id, is_write]
     *    @return      [type]                 [description]
     */

    function button_new($options)
    {
    	$url      = '#';
    	$id       = "btn_new";
    	$is_write = true;

    	if (is_array($options)) {
    		extract($options);
    	} else {
    		$url = $options;
    	}

    	$icon               = '<i class="fa fa-plus"></i>';
    	$text               = lang('btn_new');
    	$attibutes          = array();
    	$attibutes['href']  = $url;
    	$attibutes['class'] = 'btn btn-s-md btn-green btn-new';
    	$attibutes['title'] = lang('btn_new');
    	if (!$is_write) {
    		$attibutes['disabled'] = "disabled";
    	}

    	return '<a ' . concat_attributes($attibutes) . ' > ' . $icon . ' ' . $text . '</a>';
    }
}

if (!function_exists('button_delete_group')) {
    /**
     *    [button_delete_group description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_delete_group($options = array())
    {
    	$is_write = true;
    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-red btn-delete-group" id ="btn_delete_group" title="' . lang('btn_delete') . '" ' . (!$is_write ? 'disabled = "disabled"' : '') . '><i class="fa fa-trash-o"></i> ' . lang('btn_delete') . '</a>';
    }
}

if (!function_exists('button_back')) {
    /**
     *    [button_back description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_back($options = array())
    {
    	$class = "btn btn-s-md btn-default btn-back";
    	if (is_array($options)) {
    		extract($options);
    	}

    	return '<a href="javascript:void(0)" class="' . $class . '" title="' . lang('btn_back') . '"> <i class="fa fa-times"></i> ' . lang('btn_cancel') . '</a>';
    }
}

if (!function_exists('button_copy')) {
    /**
     *    [button_copy description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_copy($options = array())
    {
    	$id      = "btn_copy";
    	$data_id = '';
    	if (is_array($options)) {
    		extract($options);
    	} else {
    		$id = $options;
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-primary btn-copy" id="' . $id . '" data-id="' . $data_id . '"><i class="fa fa-floppy-o"></i> ' . lang('btn_copy') . '</a>';
    }
}

if (!function_exists('button_copy')) {
    /**
     *    [button_download Return download button string ]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       array         $options [description]
     *    @return      [type]                 [description]
     */
    function button_download($options = array())
    {
    	$id      = "btn_copy";
    	$data_id = '';
    	if (is_array($options)) {
    		extract($options);
    	} else {
    		$id = $options;
    	}

    	return '<a href="javascript:void(0)" class="btn btn-s-md btn-primary btn-download" id="' . $id . '" data-id="' . $data_id . '"><i class="fa fa-download"></i> ' . lang('btn_download') . '</a>';
    }
}

if (!function_exists('button_link')) {
    /**
     *    [button_new description]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $options [id, is_write]
     *    @return      [type]                 [description]
     */

    function button_link($options)
    {
    	$url      = '#';
    	$id       = "btn_link";
    	$is_write = true;

    	if (is_array($options)) {
    		extract($options);
    	} else {
    		$url = $options;
    	}

    	$icon               = '';
    	$text               = 'test';
    	$attibutes          = array();
    	$attibutes['href']  = $url;
    	$attibutes['class'] = 'btn btn-s-md btn-primary';
    	$attibutes['title'] = lang('');
    	if (!$is_write) {
    		$attibutes['disabled'] = "disabled";
    	}

    	return '<a ' . concat_attributes($attibutes) . ' > ' . $icon . ' ' . $text . '</a>';
    }
}


/* =============================== End Button Helper ===========================*/

if (!function_exists('get_query_string')) {
    /**
     *    [get_query_string Return query string value.]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [string]        $key [Key of query string]
     *    @return      [string]             [string value]
     */
    function get_query_string($key)
    {
    	$query_string = $_SERVER['QUERY_STRING'];
    	$parameters   = array();
    	parse_str($query_string, $parameters);

    	return array_key_exists($key, $parameters) ? $parameters[$key] : null;

    }
}

if (!function_exists('copyfolder')) {
    /**
     *    [copyfolder copy forder Ref. php manual function copy() url. http://php.net/manual/en/function.copy.php]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        $source      [description]
     *    @param       [type]        $destination [description]
     *    @return      [type]                     [description]
     */
    function copyfolder($source, $destination, $overwrite = true)
    {

        //Open the specified directory

    	$directory = opendir($source);

        //Create the copy folder location

    	if (!is_dir($destination)) {
    		mkdir($destination);
    	}

        //Scan through the folder one file at a time

    	while (($file = readdir($directory)) != false) {

            //Copy each individual file
    		copy($source . '/' . $file, $destination . '/' . $file);
    	}
    }
}

if (!function_exists('array_to_string')) {
    /**
     *    [array_to_string Return array in string Ref. php manual function print_r() url. http://php.net/manual/en/function.print-r.php]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @param       [type]        &$a  [description]
     *    @param       string        $str [description]
     *    @return      [type]             [description]
     */
    function array_to_string(&$a, $str = "")
    {
    	$array_string = '';
    	if (!empty($str)) {
    		$array_string .= $str . " = ";
    	}
    	$array_string .= ' array( ';
    	foreach ($a as $k => $v) {

    		$array_string .= "'$k'" . ' => ';

    		if (is_array($v)) {
    			$array_string .= array_to_string($v);
    		} else {
    			if (is_string($a[$k])) {
    				$array_string .= "'$a[$k]' ";
    			} else {
    				$array_string .= "$a[$k] ";
    			}

    		}
    	}
    	$array_string .= ')  ';
    	return $array_string;
    }
}

if (!function_exists('display_form')) {
    /**
     *    [display_form I do not know either. why i am create it.]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @return      [type]        [description]
     */
    function display_form()
    {
    	return '';
    }
}

if (!function_exists('readFileToArray')) {
    /**
     *    [display_form I do not know either. why i am create it.]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @return      [type]        [description]
     */
    function readFileToArray($f)
    {
    	$s  = array();
    	$fp = fopen($f, 'r');
    	while (!feof($fp)) {
    		$s[] = fgets($fp);
    	}
    	fclose($fp);

    	return $s;
    }
}

if (!function_exists('getUserLogin')) {
    /**
     *    [display_form I do not know either. why i am create it.]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @return      [type]        [description]
     */
    function getUserLogin()
    {
    	$user_id = '';
    	foreach (getallheaders() as $name => $value) {
    		if ($name == "x-user-id") {
    			$user_id = $value;
    			break;
    		}
    	}
    	return $user_id;
    }
}

if (!function_exists('form_email')) {
    /**
     * Text Input Field
     *
     * @param    mixed
     * @param    string
     * @param    mixed
     * @return    string
     */
    function form_email($data = '', $value = '', $extra = '')
    {
    	if (!is_array($data)) {
    		$data = array('type' => 'email', 'name' => $data);
    	}
    	return form_input($data, $value, $extra);
    }
}

if (!function_exists('getGUID')) {
    /**
     *    [getGUID description]
     *    @author innosenz
     *    @date        2017-05-31
     *    @description [description]
     *    @return      [type]        [description]
     */
    function getGUID()
    {
    	if (function_exists('com_create_guid')) {
    		return com_create_guid();
    	} else {
    		mt_srand((double) microtime() * 10000);
    		$charid = strtoupper(md5(uniqid(rand(), true)));
    		$hyphen = chr(45);

    		$uuid = substr($charid, 0, 8) . $hyphen
    		. substr($charid, 8, 4) . $hyphen
    		. substr($charid, 12, 4) . $hyphen
    		. substr($charid, 16, 4) . $hyphen
    		. substr($charid, 20, 12);
            // .chr(125);
    		return $uuid;
    	}
    }

}

function simpleMail($config, $form, $to, $subject, $message, $debug = false)
{

	$CI = get_instance();
	$CI->load->library('email');

	$CI->email->initialize($config);

	$CI->email->from($form);
	$CI->email->to($to);

	$CI->email->subject($subject);
	$CI->email->message($message);

	if ($CI->email->send()) {
		if ($debug) {
			echo 'Your email was sent.';
		}

		return true;
	} else {
		if ($debug) {
			show_error($CI->email->print_debugger());
		}

		return false;
	}
}

function parameterize_array($array)
{
	foreach ($array as $key => $value) {
		yield $key . '="' . $value . '"';
	}
}

function concat_attributes($attibutes)
{
	return implode(iterator_to_array(parameterize_array($attibutes)), ' ');
}

if (!function_exists('findInArray')) {
    /**
     *    [findInArray description]
     *    @author innosenz
     *    @date   2017-09-20
     *    @param  [type]     $array  [description]
     *    @param  [type]     $needle [description]
     *    @return [type]             [description]
     */
    function findInArray($array, $needle)
    {
        foreach ($array as $key => $value) {
            if (strtolower($key) == strtolower($needle)) {
                return $array[$key];
            }
        }

        return false;
    }
}


if ( ! function_exists('calAge'))
{   
    /**
     *    [display_form I do not know either. why i am create it.]
     *    @author innosenz
     *    @version     1
     *    @date        2017-03-09
     *    @description [description]
     *    @return      [type]        [description]
     */
    function calAge($dateOfBirth) 
    {   
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff->format('%y');
    } 
}

if ( ! function_exists('validateDate'))
{   
    /**
     *    [display_form I do not know either. why i am create it.]
     *    @author Spindelz
     *    @version     1
     *    @date        2021-01-31
     *    @description [description]
     *    @return      [boolean]        [description]
     */
    function validateDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
}
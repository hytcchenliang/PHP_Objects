$site_from_arr_new=explode(',', $filter ['site_from']);//多个域名搜索
		if (in_array('sheinside', $site_from_arr_new)) {//选择包含sheinside总
			$site_from_arr=get_all_sites();
			$site_from_arr = array_flip($site_from_arr);	
			$site_from_arr_new = array_merge($site_from_arr_new,$site_from_arr);
		} 
		if(in_array('flat', $site_from_arr_new)){//选择包含平台总
			$site_from_arr_new = array_merge($site_from_arr_new,$GLOBALS['flat_arr']);
		} 
		$where_order .= " AND a.site_from IN('". join("','",$site_from_arr_new) . "') ";
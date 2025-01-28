<?php
if (!defined("ROOT_PATH"))
{
	header("HTTP/1.1 403 Forbidden");
	exit;
}
class pjPaginatorCustom extends pjPaginator
{
/**
 * Render pagination
 *
 * @param int $pages Pages array. Get it from pjPaginator::numbers
 * @param int $current Current page
 * @param string $url Links location URL
 * @param array $urlParams Params that are need to be passed in the URL
 * @return string
 */
	public static function render($pages, $current, $url, $urlParams = array(), $paramName='page')
	{
		$pagination = '';
		$params = array();

		foreach ($urlParams as $key => $val)
		{
			if (!in_array($key, array($paramName)))
			{
				if (is_array($val))
				{
					foreach ($val as $sub_key => $sub_val)
					{
						$params[] = $key . '=' . $sub_val;
					}
				} else {
					$params[] = $key . '=' . $val;
				}
			}
		}

		$sep1 = strpos($url, '?') === false ? '?' : '&amp;';
		$sep2 = count($params) > 0 ? '&amp;' : NULL;
		$params = join('&amp;', $params);
		
		if ($pages)
		{
			$page = isset($urlParams[$paramName]) && (int) $urlParams[$paramName] > 0 ? intval($urlParams[$paramName]) : 1;
			$totalPages = count($pages);
			if ($totalPages > 1 && $page > 1)
			{
				$pagination .= '<li><a href="'.$url.$sep1.$params.$sep2.$paramName.'='.($page-1).'" class="focus"><abbr></abbr>'. __('front_index_prev_page', true).'</a></li>';
			}
			foreach ($pages as $value)
			{
				if ($value == $current)
				{
					$pagination .= '<li><span class="current"><abbr></abbr>'.$value.'</span></li>';
				} elseif ($value>0) {
					$pagination .= '<li><a href="'.$url.$sep1.$params.$sep2.$paramName.'='.$value.'" class="focus" title="Go to page '.$value.'"><abbr></abbr>'.$value.'</a></li>';
				} else {
					$pagination .= '<li><span class="dots"><abbr></abbr>'.$value.'</span></li>';
				}
			}
			if ($totalPages > 1 && $page < $totalPages)
			{
				$pagination .= '<li><a href="'.$url.$sep1.$params.$sep2.$paramName.'='.($page+1).'" class="focus"><abbr></abbr>'. __('front_index_next_page', true).'</a></li>';
			}
		}
		
		return $pagination;
	}
}
?>
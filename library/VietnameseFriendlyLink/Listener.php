<?php

class VietnameseFriendlyLink_Listener
{
	public static function init_dependencies(XenForo_Dependencies_Abstract $dependencies, array $data)
	{
		global $UTF8_LOWER_ACCENTS, $UTF8_UPPER_ACCENTS;

		static $mapLower = array(
			'a' => array('à','á','ạ','ả','ã','â','ầ','ấ','ậ','ẩ','ẫ','ă','ằ','ắ','ặ','ẳ','ẵ'),
			'e' => array('è','é','ẹ','ẻ','ẽ','ê','ề','ế','ệ','ể','ễ'),
			'i' => array('ì','í','ị','ỉ','ĩ'),
			'o' => array('ò','ó','ọ','ỏ','õ','ô','ồ','ố','ộ','ổ','ỗ','ơ','ờ','ớ','ợ','ở','ỡ'),
			'u' => array('ù','ú','ụ','ủ','ũ','ư','ừ','ứ','ự','ử','ữ'),
			'y' => array('ỳ','ý','ỵ','ỷ','ỹ'),
			'd' => array('đ'),
		);

		static $mapUpper = array(
			'A' => array('À','Á','Ạ','Ả','Ã','Â','Ầ','Ấ','Ậ','Ẩ','Ẫ','Ă','Ằ','Ắ','Ặ','Ẳ','Ẵ'),
			'E' => array('È','É','Ẹ','Ẻ','Ẽ','Ê','Ề','Ế','Ệ','Ể','Ễ'),
			'I' => array('Ì','Í','Ị','Ỉ','Ĩ'),
			'O' => array('Ò','Ó','Ọ','Ỏ','Õ','Ô','Ồ','Ố','Ộ','Ổ','Ỗ','Ơ','Ờ','Ớ','Ợ','Ở','Ỡ'),
			'U' => array('Ù','Ú','Ụ','Ủ','Ũ','Ư','Ừ','Ứ','Ự','Ử','Ữ'),
			'Y' => array('Ỳ','Ý','Ỵ','Ỷ','Ỹ'),
			'D' => array('Đ'),
		);

		foreach ($mapLower as $to => $fromMany)
		{
			foreach ($fromMany as $from)
			{
				$UTF8_LOWER_ACCENTS[$from] = $to;
			}
		}

		foreach ($mapUpper as $to => $fromMany)
		{
			foreach ($fromMany as $from)
			{
				$UTF8_UPPER_ACCENTS[$from] = $to;
			}
		}

		XenForo_Link::romanizeTitles(true);
	}

	public static function file_health_check(XenForo_ControllerAdmin_Abstract $controller, array &$hashes)
	{
		$hashes += VietnameseFriendlyLink_FileSums::getHashes();
	}
}

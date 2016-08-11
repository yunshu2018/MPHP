<?php
use MF\Model;
use MF\Service;
use MF\Libraries\Fake;

class PostModel extends Model
{
	/**
	 * @param $count
	 */
	public function getLatestPost($cates, $count)
	{
		$condition = [
			'catalog_id'   =>  ['op'=>'in', 'val'=>$cates],
		];
		$data = Service::post($condition, 1, $count, 1)->send('Post.getList');

		if (Fake::check($data)) {
			return [];
		}

		return $data;
	}

	public static function getPostById($id)
	{
		if (! $id) {
			return [];
		}
		$condition = [
			'id'    =>  $id
		];
		$data = Service::post($condition)->send('Post.getOne');
		if (Fake::check($data)) {
			return [];
		}

		return $data;
	}

	public static function model($class = __CLASS__)
	{
		return parent::model($class);
	}
}
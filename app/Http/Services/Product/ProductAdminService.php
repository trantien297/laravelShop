<?php

namespace App\Http\Services\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

/**
 * 
 */
class ProductAdminService
{
	public function getMenu()
	{
		return Menu::where('active', 1)->get();
	}

	protected function isValidPrice($request)
	{
		if($request->input('price') != '' && $request->input('price_sale') != '' && $request->input('price_sale') >= $request->input('price')){
			Session::flash('error', 'Giá bán phải thấp hơn giá gốc');
			return false;
		}

		if((int) $request->input('price') > 0 && (int) $request->input('price_sale') == 0){
			Session::flash('error', 'Vui lòng nhập giá bán');
			return false;
		}

		return true;
	}

	public function insert($request)
	{
		$isValidPrice = $this->isValidPrice($request);
		if($isValidPrice == false) return false;

		try{
			Product::create([
				'name' => (string) $request->input('name'),
				'description' => (string) $request->input('description'),
				'content' => (string) $request->input('content'),
				'menu_id' => (int) $request->input('menu_id'),
				'price' => (int) $request->input('price'),
				'price_sale' => (int) $request->input('price_sale'),
				'active' => (int) $request->input('active'),
				'thumb' => (string) $request->input('thumb'),
				'slug' => Str::of($request->input('name'))->slug('-'),
			]);

			//$request->except('_token');
			//Product::create($request->all());

			Session::flash('success', 'Đã thêm sản phẩm mới thành công');
		} catch (\Exception $err) {
			Session::flash('error', $err->getMessage());
			\Log::info($err->getMessage());
			return false;
		}

		return true;
	}

	public function get()
	{
		return Product::
			with('menu')
			->orderbyDESC('id')->paginate(20);
	}

	public function update($product, $request)
	{
		$isValidPrice = $this->isValidPrice($request);
		if($isValidPrice == false) return false;

		try{
			$product->name = (string) $request->input('name');
			$product->description = (string) $request->input('description');
			$product->content = (string) $request->input('content');
			$product->menu_id = (int) $request->input('menu_id');
			$product->price = (int) $request->input('price');
			$product->price_sale = (int) $request->input('price_sale');
			$product->active = (int) $request->input('active');
			$product->thumb = (string) $request->input('thumb');
			$product->slug = Str::of($request->input('name'))->slug('-');
			$product->save();

			Session::flash('success', 'Đã cập nhật sản phẩm thành công!');
		} catch(\Exception $err){
			Session::flash('error', $err->getMessage());
			\Log::info($err->getMessage());
			return  false;
		}
		return true;
	}

	public function delete($request)
	{
		$product = Product::where('id', $request->input('id'))->first();
		if($product){
			$product->delete();
			return true;
		}
		return false;
	}
}
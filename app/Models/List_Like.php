<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_Like extends Model
{
    use HasFactory;

    public $items = null;

    public function __construct($oldList)
    {
        if ($oldList) {
            $this->items = $oldList->items;
        }
    }

    // Thêm một mặt hàng vào danh sách
    public function add($item, $id)
    {
        $mathang = ['item' => $item];
        $this->items[$id] = $mathang;
    }

    // Xóa một mặt hàng khỏi danh sách
    public function removeItem($id)
    {
        unset($this->items[$id]);
    }
}
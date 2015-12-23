<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUploadImg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::statement("create table upload_file(
 id int(12) not null AUTO_INCREMENT,
 usages varchar(20) not null default '' comment '图片用途',
  file_name varchar(100) not null default '' comment '文件名',
  file_url varchar(200) not null default '' comment '链接地址',
 status TINYINT(1) default 0 comment '0表示图片未使用，1表示图片已使用',
 deleted_status TINYINT(1) default 0 comment '0表示图片未被删除，1表示图片已被删除',
 origin varchar(20) not null default '' comment '图片来源',
  created_at datetime NOT NULL COMMENT '创建时间',
  updated_at datetime NOT NULL COMMENT '更新时间',
  PRIMARY key(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

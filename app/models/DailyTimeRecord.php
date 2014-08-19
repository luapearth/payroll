<?php

class DailyTimeRecord extends \Eloquent {
	protected $fillable = ['rid', 'employeeid', 'rdate', 'rtime', 'rtype', 'img_url'];
}
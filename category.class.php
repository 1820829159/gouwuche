function getTree($array, $pid =0, $level = 0){
static $list = [];
foreach ($array as $key => $value){
if ($value['pid'] == $pid){
$value['level'] = $level;
$list[] = $value;
unset($array[$key]);
$this->getTree($array, $value['id'], $level+1);

}
}
return $list;
}




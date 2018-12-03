<?php
function getItems($key=""){
	if(!$key) return false;
	$pos = strpos($key, '.');
	$posA = strpos($key, '-');

	if($pos !== false){

		list($keys,$sub) = explode('.', $key);
		$data = config_item($keys);
		if(isset($data->{$sub})){
			return $data->{$sub};
		}
		
	}else if($posA !== false){

		list($keys,$sub) = explode('-', $key);
		$data = config_item($keys);
		if(isset($data[$sub])){
			return $data[$sub];
		}

	}else{
		return config_item($key);
	}

}


function is_stores(){
	
	if(getItems("app.app_id") > 0){
		return true;
	}
	return false;
}


function render_menu($type){
	$type = ($type == "slider" ? "slider" : "header");
	$ci = &get_instance();
	if(!isset($ci->app->menu->{$type})) return [];
	$arv = [];
	$menu = $ci->app->menu->{$type};
	$options = ""; 
	foreach($menu as $key => $value){
		$icoin = ($value->icon ? '<i class="'.$value->icon.'"></i> ' : "");
		$child = "";
		if(isset($value->child->{$type})){
			$child = implode(render_child($value->child->{$type}, $type), "\n");
		}
		if($ci->app->admin !== false && $ci->app->mode === 'edit'){ 
			$options = '<div class="options_menu"><i data-href="/admin/menuinsert/'.$type.'/'.$value->menu_id.'" class="fa fa-plus"></i> <i class="fa fa-edit" data-toggle="modal" data-target="#editMenuModal" data-name="'.$value->name.'" data-url="'.$value->url.'" data-action="/admin/updatemenu/'.$value->menu_id.'"></i> <i class="fa fa-trash" data-toggle="modal" data-url="/admin/removemenu/'.$value->menu_id.'" data-target="#removeModal"></i><div>';
		}
        $arv[] = '<li><a href="/catalog/'.$value->url.'" data-target="'.$value->url.'">'.$icoin.$value->name.'</a>'.$child.$options.'</li>';
    }
    return $arv;
}

function render_child($obj, $type){
	if(!$obj) return;
	$ci = &get_instance();
	$arv = [];
	$options = '';
	$arv[] = '<ul>';
		foreach ($obj as $key => $value) {
			$icoin = (isset($value->icon) ? '<i class="'.$value->icon.'"></i> ' : "");
			if($ci->app->admin !== false && $ci->app->mode === 'edit'){ 
				$options = '<div class="options_menu"><i data-href="/admin/menuinsert/'.$type.'/'.$value->menu_id.'" class="fa fa-plus"></i> <i class="fa fa-edit" data-toggle="modal" data-target="#editMenuModal" data-name="'.$value->name.'" data-url="'.$value->url.'" data-action="/admin/updatemenu/'.$value->menu_id.'"></i> <i class="fa fa-trash" data-toggle="modal" data-url="/admin/removemenu/'.$value->menu_id.'" data-target="#removeModal"></i><div>';
			}
			$child = (isset($value->child->{$type}) ? implode(render_child($value->child->{$type}, $type), "\n") : "");
			$arv[] = '<li><a href="/catalog/'.$value->url.'">'.$icoin.$value->name.'</a>'.$child.$options.'</li>';
		}
		
	$arv[] = '</ul>';
	return $arv;
}

function notesServices(){
	
}
?>
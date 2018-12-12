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

function render_menu_header($type){
	$type = ($type == "slider" ? "slider" : "header");
	$ci = &get_instance();
	if(!isset($ci->app->menu->{$type})) return [];
	$arv = [];
	$menu = $ci->app->menu->{$type};
	$options = ""; 
	foreach($menu as $key => $value){
	}
}

function render_menu($type){
	$type = ($type == "slider" ? "slider" : "header");
	$ci = &get_instance();
	if(!isset($ci->app->menu->{$type})) return [];
	$arv = [];
	$menu = $ci->app->menu->{$type};
	$options = ""; 
	foreach($menu as $key => $value){
		$icoin = '<i class="'.($value->icon ? $value->icon : "fa fa-chevron-right").'"></i> ';
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


/*
	Editer Helper
*/

	function editer_setup($plugins=[]){
		$arv = [];
		$arv[] = '<script src="'.site_url("resource/editer/js/froala_editor.min.js").'"></script>';
		$arv[] = '<script src="'.site_url("resource/editer/js/froala_editor.pkgd.min.js").'"></script>';
		$arv[] = '<link href="'.site_url("resource/editer/css/froala_editor.min.css").'" rel="stylesheet"/>';
		$arv[] = '<link href="'.site_url("resource/editer/css/froala_editor.pkgd.min.css").'" rel="stylesheet"/>';
		$arv[] = '<link href="'.site_url("resource/editer/css/froala_style.min.css").'" rel="stylesheet"/>';
		
		foreach ($plugins as $key => $value) {
			$arv[] = '<script src="'.site_url("resource/editer/js/plugins/".$value.".min.js").'"></script>';
			$arv[] = '<link href="'.site_url("resource/editer/css/plugins/".$value.".min.css").'" rel="stylesheet"/>';
		}
		return implode($arv, "\n");
	}

	function editer($target=[]){
		$arv = [];
		$arv[] = '<script type="text/javascript">';
		$arv[] = 'jQuery(document).ready(function(){';
		$arv[] = '
		$.FroalaEditor.DefineIcon("buttonIcon", { NAME: "star"});
		$.FroalaEditor.RegisterQuickInsertButton("myButton", {
					      
					      icon: "buttonIcon",
					      title: "My Button",
					 
					      
					      callback: function () {
					        
					        this.html.insert("<h4>Title Document</h4><p>Text Description</p>");
					      },
					 
					   
					      undo: true
					    });

		

					    ';

		foreach ($target as $key => $value) {
			$arv[] = '
			$("'.$value.'").froalaEditor({
				toolbarInline: true,
				charCounterCount: false,
				quickInsertButtons: ["image", "video", "table", "ol", "ul", "myButton"],
				pluginsEnabled: ["quickInsert", "image", "table", "lists","video"],
				
        		imageUploadURL: "/upload/image",
        		imageUploadParam: "filename",
				imageStyles: {
					        "w-100": "w-100",
					        class2: "w-50"
					      },

				imageEditButtons: ["imageReplace", "imageAlign", "imageRemove", "|", "imageLink", "linkOpen", "linkEdit", "linkRemove", "-", "imageDisplay", "imageStyle", "imageAlt", "imageSize"]

			});
			$("'.$value.'").on("click", function(e){
				e.preventDefault();
				if (!$("'.$value.'").data("froala.editor")) {
			      $("'.$value.'").froalaEditor({
						toolbarInline: true,
						charCounterCount: false,
						
						pluginsEnabled: ["quickInsert", "image", "table", "lists"]
					});
			    }
			});
			';
		}
		//$arv[] = '$(".fr-wrapper div:first-child a").remove();';
		$arv[] = '});';

		$arv[] = '</script>';
		return implode($arv, "\n");
	}

?>
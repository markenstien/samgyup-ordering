<?php   

    function btnCreate( $route  , $text = 'Create', $attributes  = null)
    {
        $attributes = keypair_to_str($attributes ?? []);
        return <<<EOF
            <a href="{$route}" class="btn btn-primary btn-xs" {$attributes}><i class='fa fa-plus'> </i> {$text} </a>
        EOF;
    }
    
    function btnView( $route  , $text = 'Show', $attributes  = null)
    {
        $attributes = keypair_to_str($attributes ?? []);
        return <<<EOF
            <a href="{$route}" class="btn btn-primary btn-xs" {$attributes}><i class='fa fa-eye'> </i> {$text} </a>
        EOF;
    }

    function btnEdit( $route  , $text = 'Edit', $attributes  = null )
    {
        $attributes = keypair_to_str($attributes ?? []);
        return <<<EOF
            <a href="{$route}" class="btn btn-primary btn-xs" {$attributes}><i class='fa fa-edit'> </i> {$text}  </a>
        EOF;
    }

    function btnDelete( $route  , $text = 'Delete', $attributes  = null )
    {
        $attributes = keypair_to_str($attributes ?? []);
        return <<<EOF
            <a href="{$route}" class="form-verify btn btn-danger btn-xs" {$attributes}><i class='fa fa-trash'> </i> {$text} </a>
        EOF;
    }

    function btnList( $route  , $text = 'List', $attributes  = null )
    {
        $attributes = keypair_to_str($attributes ?? []);
        return <<<EOF
            <a href="{$route}" class="btn btn-primary btn-xs" {$attributes}><i class='fa fa-list'> </i> {$text}  </a>
        EOF;
    }

    /*
    *ancors
    *['url' , 'icon' , 'text']
    */
    function anchorList( $anchors = [])
    {
        $token = random_letter(12);

        $html  = <<<EOF
        <div class="dropdown mb-2">
        <button class="btn p-0" type="button" id="dropdownMenuButton-{$token}" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton-{$token}">
        EOF;

        foreach($anchors as $anchor)
        {
            $html .= <<<EOF
            <a class="dropdown-item d-flex align-items-center" href="{$anchor['url']}">
                <i data-feather="{$anchor['icon']}" class="icon-sm me-2"></i> 
            <span class="">{$anchor['text']}</span></a>
            EOF;
        }

        $html.= <<<EOF
            </div>
        </div>
        EOF;

        return $html;
    }

    function anchor( $route , $type = 'edit' , $text = null , $color = null)
    {
        $icon = 'edit';
        $a_text = 'Edit';
        $a_color = 'primary';

        switch($type)
        {
            case 'delete':
                $icon = 'trash';
                $a_text = 'Delete';
            break;
            case 'edit':
                $icon = 'edit';
                $a_text = 'Edit';
            break;

            case 'view':
                $icon = 'eye';
                $a_text = 'Show';
            break;

            case 'create':
                $icon = 'plus';
                $a_text = 'Create';
            break;

            default:
                $icon = 'fa-check-circle';
        }

        if( !is_null($text) )
            $a_text = $text;

        if( !is_null($color) )
            $a_color = 'danger';

        return <<<EOF
            <a href="{$route}" class='text-{$a_color}'><i class='fa fa-{$icon}'> </i> {$a_text}  </a>
        EOF;
    }


    function divider()
    {
        print <<<EOF
            <div style='margin:30px 0px'>
            </div>
        EOF;
    }

    function wReturnLink( $route )
    {
        print <<<EOF
            <a href="{$route}">
                <i class="feather icon-corner-up-left"></i> Return
            </a>
        EOF;
    }

    function wLinkDefault($link , $text = 'Edit' , $attributes = [])
	{	
		$icon = isset($attributes['icon']) ? "<i class='{$attributes['icon']}'> </i>" : null;
		$attributes = is_null($attributes) ? $attributes : keypairtostr($attributes);
		return <<<EOF
			<a href="{$link}" style="text-decoration:underline" {$attributes}>{$icon} {$text}</a>
		EOF;
	}

    function wWrapSpan($text)
    {
        $retVal = '';
        
        if(is_array($text))
        {
            foreach($text as $key => $t) 
            {
                if( $key > 3 )
                    $classHide = '';
                $retVal .= "<span class='badge badge-primary badge-classic'> {$t} </span>";
            }
        }else{
            $retVal = "<span class='badge badge-primary badge-classic'> {$text} </span>";
        }

        return $retVal;
    }

    function wBadgeWrap($text, $type) {
        return <<<EOF
            <span class='badge bg-{$type}'>{$text}</span>
        EOF;
    }

    

    function wDivider($height = 30)
    {
        return <<<EOF
            <div style="margin-top:{$height}px"> </div>
        EOF;
    }

    function wSpanBuilder($text, $badge_type = 'primary')
    {
        $retVal = '';
        $retVal = "<span> {$text} </span>";
        return $retVal;
    }

    function wTableContent($tableNumber, $tableId, $status, $link) {
        $boxColor = '';

        switch($status) {
            case 'available':
                $boxColor = 'box-table-sm-available';
            break;

            case 'occupied':
                $boxColor = 'box-table-sm-occupied';
            break;

            case 'reserved':
                $boxColor = 'box-table-sm-reserved';
            break;

            default:
                $boxColor = 'box-table-sm-selected';
            break;
        }
        return <<<EOF
            <div style='cursor:pointer' class='box-table box-table-sm {$boxColor}' 
            onclick='location.href="{$link}"' 
            data-id="{$tableId}" 
            data-text = "{$tableNumber}"
            data-status = "{$status}"
            title="{$status}">
                <h2>{$tableNumber}</h2>
            </div>
        EOF;
    }

    function wCardTitle($title) {
        return <<<EOF
            <h6 class='m-0 font-weight-bold'>{$title}</h6>
        EOF;
    }

    function wCardHeader($content) {
        return <<<EOF
            <div class="card-header py-3" style="background-color:#0D0CB5;
                color:#fff">
                {$content}
            </div>
        EOF;
    }
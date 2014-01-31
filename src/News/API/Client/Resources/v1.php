<?php
/*
 * Service description for v1 of the News API
 */
return array(
    'name'        => 'News API',
    'apiVersion'  => 'v1',
    'description' => 'Allows consumption of News\'s internal services via an API',
    'operations'  => array(
    
        /* News - Content API */
        'getContent' => array(
            'httpMethod' => 'GET',
            'uri'        => '/content/{version}/',
            'summary'    => 'Retrieve a list of content items sorted by most recent first.',

            'parameters' => array(
                'apiKey' => array(
                    'location'    => 'query',
                    'description' => 'The API key used.',
                    'type'        => 'string',
                    'sentAs'      => 'api_key',
                    'required'    => true
                ),
                'format' => array(
                    'location'    => 'query',
                    'description' => 'Set the format of the response.',
                    'type'        => 'string',
                    'default'     => 'json',
                    'pattern'     => '/^(json|xml)$/',
                    'required'    => false
                ),
                'type' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by content item type. Multiple parameters allowed.',
                    'type'        => 'string',
                    'required'    => false
                ),
                'category' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by category path, or an element of the path.',
                    'type'        => 'string',
                    'required'    => false
                ),
                'keyword' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by keyword. Multiple parameters allowed.',
                    'type'        => 'string',
                    'required'    => false
                ),
                'author' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by author. Multiple parameters allowed.',
                    'type'        => 'string',
                    'required'    => false
                ),
                'domain' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by domain (the publication masthead). Multiple parameters allowed.',
                    'type'        => 'string',
                    'required'    => false
                ),
                'paidStatus' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by paid status (for premium or non-premium content)',
                    'type'        => 'string',
                    'pattern'     => '/^(premium|non_premium)$/',
                    'required'    => false
                ),
                'origin' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by content origin. Multiple parameters allowed.',
                    'type'        => 'string',
                    'required'    => false
                ),
                'originId' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by the origin ID. Multiple parameters allowed.',
                    'type'        => 'string',
                    'required'    => false
                ),
                'title' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by terms appearing in the content title.',
                    'type'        => 'string',
                    'required'    => false
                ), 
                'subtitle' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by terms appearing in the content subtitle.',
                    'type'        => 'string',
                    'required'    => false
                ), 
                'description' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by terms appearing in the content description.',
                    'type'        => 'string',
                    'required'    => false
                ), 
                'originalSource' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by the Original Source of the content.',
                    'type'        => 'string',
                    'required'    => false
                ), 
                'creditedSource' => array(
                    'location'    => 'query',
                    'description' => 'Filters the result set by the Credited Source of the content.',
                    'type'        => 'string',
                    'required'    => false
                ), 
                'q' => array(
                    'location'    => 'query',
                    'description' => 'Performs a text based query. Matches across the title, subtitle, description, keyword, and body fields. Using this parameter causes search results to be returned ordered by relevance rather than the default order of descending date updated.',
                    'type'        => 'string',
                    'required'    => false
                ), 
                'since' => array(
                    'location'    => 'query',
                    'description' => 'Only retrieve content with a dateUpdated since (later than) the given timestamp. Dates should be specified in ISO 8601 format (i.e. yyyy-MM-dd\'T\'HH:mm:ss.SSSZZ) and in UTC/Zulu time.',
                    'type'        => 'string',
                    'required'    => false
                ), 
                'before' => array(
                    'location'    => 'query',
                    'description' => 'Only retrieve content with a dateUpdated before (earlier than) the given timestamp. Dates should be specified in ISO 8601 format (i.e. yyyy-MM-dd\'T\'HH:mm:ss.SSSZZ) and in UTC/Zulu time.',
                    'type'        => 'string',
                    'required'    => false
                ), 
                'includeRelated' => array(
                    'location'    => 'query',
                    'description' => 'Sets whether or not to include related content items in the returned result set. You may wish to set this to false if you are concerned about bandwidth or to increase the speed of retrieval for a large amount of content items.',
                    'type'        => array('string', 'boolean'),
                    'pattern'     => '/^(true|false)$/',
                    'default'     => 'false',
                    'required'    => false
                ),
                'includeBodies' => array(
                    'location'    => 'query',
                    'description' => 'Sets whether or not to include news story bodies is the results. Story bodies can be large, so not requesting them will improve performance and response times.',
                    'type'        => array('string', 'boolean'),
                    'pattern'     => '/^(true|false)$/',
                    'default'     => 'false',
                    'required'    => false
                ),
                'html' => array(
                    'location'    => 'query',
                    'description' => 'Defines the level of HTML formatting to include in returned attributes. You need to specify the mode (full) and the scope (body or all).',
                    'type'        => 'string',
                    'pattern'     => '/^(full\,all|full\,body)$/',
                    'required'    => false
                ),
                'maxRelated' => array(
                    'location'    => 'query',
                    'description' => 'The number of related items to return',
                    'type'        => 'integer',
                    'required'    => false
                ),
                'pageSize' => array(
                    'location'    => 'query',
                    'description' => 'The number of content items to return in a single request.',
                    'type'        => 'integer',
                    'default'     => 20,
                    'required'    => false
                ),
                'offset' => array(
                    'location'    => 'query',
                    'description' => 'The item offset to apply when returning search results for pagination. The index is zero based, so with a pageSize of 20, the second page of results would have an index of 20, and the third page would have an index of 40.',
                    'type'        => 'integer',
                    'default'     => 0,
                    'required'    => false
                )
            ),
        ),
        
        'getContentById' => array(
            'httpMethod' => 'GET',
            'uri'        => '/content/{version}/{id}',
            'summary'    => 'Retrieve a single content item by ID or Origin ID.',
            
            'parameters' => array(
                'apiKey' => array(
                    'location'    => 'query',
                    'description' => 'The API key used.',
                    'type'        => 'string',
                    'sentAs'      => 'api_key',
                    'required'    => true
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'The internal ID of the content item.',
                    'type'        => 'string',
                    'required'    => true
                ),
                'format' => array(
                    'location'    => 'query',
                    'description' => 'Set the format of the response.',
                    'type'        => 'string',
                    'default'     => 'json',
                    'pattern'     => '/^(json|xml)$/',
                    'required'    => false
                ),
                'html' => array(
                    'location'    => 'query',
                    'description' => 'Defines the level of HTML formatting to include in returned attributes. You need to specify the mode (full) and the scope (body or all).',
                    'type'        => 'string',
                    'pattern'     => '/^(full\,all|full\,body)$/',
                    'required'    => false
                ),
            )
        ),
        
        'getCategoryList' => array(
            'httpMethod' => 'GET',
            'uri'        => '/category/{version}/list/',
            'summary'    => 'Retrieve a list of categories using a RESTful path structure.',
            
            'parameters' => array(
                'apiKey' => array(
                    'location'    => 'query',
                    'description' => 'The API key used.',
                    'type'        => 'string',
                    'sentAs'      => 'api_key',
                    'required'    => true
                ),
                'include' => array(
                    'location'    => 'query',
                    'description' => 'The level of sub-child detail to return.',
                    'type'        => 'string',
                    'pattern'     => '/^(none|children|all)$/',
                    'required'    => false
                ),
                'mode' => array(
                    'location'    => 'query',
                    'description' => 'Return the child categories as either a flat list, or in a tree format with nested children.',
                    'type'        => 'string',
                    'pattern'     => '/^(flat|tree)$/',
                    'required'    => false
                ),
                'pageSize' => array(
                    'location'    => 'query',
                    'description' => 'The number of content items to return in a single request.',
                    'type'        => 'integer',
                    'default'     => 20,
                    'required'    => false
                ),
                'offset' => array(
                    'location'    => 'query',
                    'description' => 'The item offset to apply when returning search results for pagination. The index is zero based, so with a pageSize of 20, the second page of results would have an index of 20, and the third page would have an index of 40.',
                    'type'        => 'integer',
                    'default'     => 0,
                    'required'    => false
                )
            )
        ),

        'getCategoryById' => array(
            'httpMethod' => 'GET',
            'uri'        => '/category/{version}/{id}',
            'summary'    => 'Retrieve a single category item by ID. A category item contains the path, the id, and the parent id.',
            
            'parameters' => array(
                'apiKey' => array(
                    'location'    => 'query',
                    'description' => 'The API key used.',
                    'type'        => 'string',
                    'sentAs'      => 'api_key',
                    'required'    => true
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'The ID of the category item.',
                    'type'        => 'string',
                    'required'    => true
                )
            )
        ),
        
        /* News - Config API */
        'getConfig' => array(
            'httpMethod' => 'GET',
            'uri'        => '/config/conf/',
            'summary'    => 'Retrieve a single config item by appBundleId and appVersion.',
            
            'parameters' => array(
                'apiKey' => array(
                    'location'    => 'query',
                    'description' => 'The API key used.',
                    'type'        => 'string',
                    'sentAs'      => 'api_key',
                    'required'    => true
                ),
                'appBundleId' => array(
                    'location'    => 'query',
                    'description' => 'Specifies the application bundle id.',
                    'type'        => 'string',
                    'required'    => true
                ),
                'appVersion' => array(
                    'location'    => 'query',
                    'description' => 'Specified the application version.',
                    'type'        => 'string',
                    'required'    => true
                ),
                'appPart' => array(
                    'location'    => 'query',
                    'description' => 'Specified the application part.',
                    'type'        => 'string',
                    'required'    => false
                ),
            )
        ),
        
        /* News - Image API */
        'getImage' => array(
            'httpMethod' => 'GET',
            'uri'        => '/image/{version}/{id}',
            'summary'    => 'Retrieve (and optionally resize and crop) a Fatwire image crop. Images will be cropped if the specified dimensions do not match the original aspect ratio. Images can not be stretched, and will not be upscaled past their original size.',
            
            'parameters' => array(
                'apiKey' => array(
                    'location'    => 'query',
                    'description' => 'The API key used.',
                    'type'        => 'string',
                    'sentAs'      => 'api_key',
                    'required'    => true
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'The ContentAPI ID of the image crop to resize.',
                    'type'        => 'string',
                    'required'    => true
                ),
                'width' => array(
                    'location'    => 'query',
                    'description' => 'The required width (defaults to 640)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'height' => array(
                    'location'    => 'query',
                    'description' => 'The required height',
                    'type'        => 'string',
                    'required'    => false
                ),
                'crop' => array(
                    'location'    => 'query',
                    'description' => 'The crop factor or ratio (used if width AND height are not supplied). E.g. 1:1, 4:3 or 1, 1.5 (defaults to the aspect ratio or the original image)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'cropRule' => array(
                    'location'    => 'query',
                    'description' => 'The area where the crop should be anchored to: top, left, right, bottom, centre, topLeft, bottomRight etc. (defaults to centre)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'original' => array(
                    'location'    => 'query',
                    'description' => 'If present, the original full sized source image is returned (overrides all other resize and crop parameters)',
                    'type'        => 'string',
                    'required'    => false
                ),  
            )
        ),
        
        'getImageSourceOf' => array(
            'httpMethod' => 'GET',
            'uri'        => '/image/{version}/sourceof/{id}',
            'summary'    => 'Retrieve (and optionally resize and crop) a Fatwire source image. Images will be cropped if the specified dimensions do not match the original aspect ratio. Images can not be stretched, and will not be upscaled past their original size.',
            
            'parameters' => array(
                'apiKey' => array(
                    'location'    => 'query',
                    'description' => 'The API key used.',
                    'type'        => 'string',
                    'sentAs'      => 'api_key',
                    'required'    => true
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'The ContentAPI ID of the image source to crop to resize.',
                    'type'        => 'string',
                    'required'    => true
                ),
                'width' => array(
                    'location'    => 'query',
                    'description' => 'The required width (defaults to 640)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'height' => array(
                    'location'    => 'query',
                    'description' => 'The required height',
                    'type'        => 'string',
                    'required'    => false
                ),
                'crop' => array(
                    'location'    => 'query',
                    'description' => 'The crop factor or ratio (used if width AND height are not supplied). E.g. 1:1, 4:3 or 1, 1.5 (defaults to the aspect ratio or the original image)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'cropRule' => array(
                    'location'    => 'query',
                    'description' => 'The area where the crop should be anchored to: top, left, right, bottom, centre, topLeft, bottomRight etc. (defaults to centre)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'original' => array(
                    'location'    => 'query',
                    'description' => 'If present, the original full sized source image is returned (overrides all other resize and crop parameters)',
                    'type'        => 'string',
                    'required'    => false
                ),  
            )
        ),
        
        'getImageExternal' => array(
            'httpMethod' => 'GET',
            'uri'        => '/image/{version}/external',
            'summary'    => 'Retrieve (and optionally resize and crop) an externally hosted image. Images will be cropped if the specified dimensions do not match the original aspect ratio. Images can not be stretched, and will not be upscaled past their original size.',
            
            'parameters' => array(
                'apiKey' => array(
                    'location'    => 'query',
                    'description' => 'The API key used.',
                    'type'        => 'string',
                    'sentAs'      => 'api_key',
                    'required'    => true
                ),
                'url' => array(
                    'location'    => 'query',
                    'description' => 'The URL of the externally hosted image to resize.',
                    'type'        => 'string',
                    'required'    => true
                ),
                'width' => array(
                    'location'    => 'query',
                    'description' => 'The required width (defaults to 640)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'height' => array(
                    'location'    => 'query',
                    'description' => 'The required height',
                    'type'        => 'string',
                    'required'    => false
                ),
                'crop' => array(
                    'location'    => 'query',
                    'description' => 'The crop factor or ratio (used if width AND height are not supplied). E.g. 1:1, 4:3 or 1, 1.5 (defaults to the aspect ratio or the original image)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'cropRule' => array(
                    'location'    => 'query',
                    'description' => 'The area where the crop should be anchored to: top, left, right, bottom, centre, topLeft, bottomRight etc. (defaults to centre)',
                    'type'        => 'string',
                    'required'    => false
                ),
                'original' => array(
                    'location'    => 'query',
                    'description' => 'If present, the original full sized source image is returned (overrides all other resize and crop parameters)',
                    'type'        => 'string',
                    'required'    => false
                ),  
                'referer' => array(
                    'location'    => 'query',
                    'description' => 'The value of the HTTP Referer header to use when requesting the image from the external source. Some sites implement a policy whereby only browsers arriving from their web pages are served images.',
                    'type'        => 'string',
                    'required'    => false
                ),  
            )
        ),
        
        /* News - Person API */
                
        /* News - Preferences API */
        
                
    )
);
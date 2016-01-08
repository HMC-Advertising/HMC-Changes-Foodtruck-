(function(){tinymce.PluginManager.add("DahzThemeShortcodes",function(e,t){e.addButton("DahzThemeShortcodes",{title:"Insert Shortcode",icon:false,type:"menubutton",menu:[{text:"Structure",menu:[{text:"Column",onclick:function(){e.windowManager.open({title:"Insert Column Shortcode",body:[{type:"listbox",name:"columnListboxName",label:"Select Column",values:[{text:"Two Column",value:"two_col"},{text:"Three Column",value:"three_col"},{text:"Four Column",value:"four_col"},{text:"Five Column",value:"five_col"}]}],onsubmit:function(t){if(t.data.columnListboxName=="two_col"){e.insertContent("[twocol_one] your content [/twocol_one][twocol_one_last] your content [/twocol_one_last]")}else if(t.data.columnListboxName=="three_col"){e.insertContent("[threecol_one] your content [/threecol_one][threecol_one] your content [/threecol_one][threecol_one_last] your content [/threecol_one_last]")}else if(t.data.columnListboxName=="four_col"){e.insertContent("[fourcol_one] your content [/fourcol_one][fourcol_one] your content [/fourcol_one][fourcol_one] your content [/fourcol_one][fourcol_one_last] your content [/fourcol_one_last]")}else if(t.data.columnListboxName=="five_col"){e.insertContent("[fivecol_one] your content [/fivecol_one][fivecol_one] your content [/fivecol_one][fivecol_one] your content [/fivecol_one][fivecol_one] your content [/fivecol_one][fivecol_one_last] your content [/fivecol_one_last]")}}})}},{text:"Gap",onclick:function(){e.windowManager.open({title:"Insert Gap Shortcode",body:[{type:"textbox",name:"textboxName",label:"Height",value:"20"}],onsubmit:function(t){e.insertContent('[gap height="'+t.data.textboxName+'"]')}})}},{text:"Table",onclick:function(){e.windowManager.open({title:"Insert Table Shortcode",body:[{type:"listbox",name:"table_ver",label:"Table Version",values:[{text:"Version 1",value:"1"},{text:"Version 2",value:"2"}]},{type:"textbox",name:"table_row",label:"How many row ?",value:"4"},{type:"textbox",name:"table_coloumn",label:"How many column ?",value:"4"}],onsubmit:function(t){e.insertContent('[table ver="'+t.data.table_ver+'"]');for(i=0;i<t.data.table_row;i++){e.insertContent("[table_tr]");for(j=0;j<t.data.table_coloumn;j++){e.insertContent("[table_td]content[/table_td]")}e.insertContent("[/table_tr]")}e.insertContent("[/table]")}})}}]},{text:"Element",menu:[{text:"Social Icon",onclick:function(){e.windowManager.open({title:"Insert Social Icon Shortcode",body:[{type:"listbox",name:"typeSosiclistboxName",label:"Type Social Icon",values:[{text:"Normal",value:"normal"},{text:"Square",value:"square"},{text:"Outline-Round",value:"outline-round"},{text:"Outline-Square",value:"outline-square"},{text:"Round",value:"round"}]},{type:"listbox",name:"sizelistboxName",label:"Size Social Icon",values:[{text:"Small",value:"small"},{text:"Medium",value:"medium"},{text:"Big",value:"big"}]},{type:"textbox",name:"textboxIconName",label:"Fontawesome Icon",value:"fa-"},{type:"textbox",name:"textboxUrlName",label:"Url",value:"http://"},{type:"listbox",name:"listboxTargetUrlName",label:"Target Url",values:[{text:"Open New Tab",value:"_blank"},{text:"Open In Current Tab",value:"_self"}]},{type:"label",name:"someHelpText",multiline:true,style:"padding: 5px 0;font-size: 11px;font-style: italic;color: #999;border-top: 1px solid #dfdfdf;",text:"Fill Background Color when you choose Type Social Icon is Square or Round"},{type:"textbox",name:"textboxBackgroundColorName",label:"Background Color",value:"#999999"},{type:"label",name:"someHelpText",multiline:true,style:"padding: 5px 0;font-size: 11px;font-style: italic;color: #999;border-top: 1px solid #dfdfdf;",text:"Fill Background Color Hover when you choose Type Social Icon is Square or Round"},{type:"textbox",name:"textboxBackgroundColorHoverName",label:"Background Color Hover",value:"#eeeeee"},{type:"label",name:"someHelpText",multiline:true,style:"padding: 5px 0;font-size: 11px;font-style: italic;color: #999;border-top: 1px solid #dfdfdf;",text:"",onPostRender:function(){this.getEl().innerHTML="Fill Icon Color when you choose Type Social Icon is Normal, Square<br/>"+"Round, Outline-Round, or Outline-Square<br/>"}},{type:"textbox",name:"textboxColorName",label:"Icon Color",value:"#ffffff"},{type:"label",name:"someHelpText",multiline:true,style:"padding: 5px 0;font-size: 11px;font-style: italic;color: #999;border-top: 1px solid #dfdfdf;",text:"",onPostRender:function(){this.getEl().innerHTML="Fill Icon Color Hover when you choose Type Social Icon is Normal, Square<br/>"+"Round, Outline-Round, or Outline-Square<br/>"}},{type:"textbox",name:"textboxColorHoverName",label:"Icon Color Hover",value:"#999999"}],onsubmit:function(t){e.insertContent('[social_icon icon="'+t.data.textboxIconName+'" url="'+t.data.textboxUrlName+'" target="'+t.data.listboxTargetUrlName+'" bg_color="'+t.data.textboxBackgroundColorName+'" bg_color_hover="'+t.data.textboxBackgroundColorHoverName+'" color="'+t.data.textboxColorName+'" color_hover="'+t.data.textboxColorHoverName+'" type="'+t.data.typeSosiclistboxName+'" size="'+t.data.sizelistboxName+'"]')}})}},{text:"Share Icon",onclick:function(){e.windowManager.open({title:"Insert Share Icon Shortcode",body:[{type:"listbox",name:"sharelistboxName",label:"Enable Share",values:[{text:"True",value:"true"},{text:"False",value:"false"}]},{type:"textbox",name:"shareTexttextboxName",label:"Share Text",value:"Share"},{type:"listbox",name:"borderRoundlistboxName",label:"Border Round",values:[{text:"True",value:"true"},{text:"False",value:"false"}]},{type:"textbox",name:"iconColortextboxName",label:"Icon Color",value:"#999999"},{type:"textbox",name:"iconColorHovertextboxName",label:"Icon Color Hover",value:"#000000"},{type:"listbox",name:"twitterlistboxName",label:"Enable Twitter",values:[{text:"True",value:"true"},{text:"False",value:"false"}]},{type:"listbox",name:"facebooklistboxName",label:"Enable Facebook",values:[{text:"True",value:"true"},{text:"False",value:"false"}]},{type:"listbox",name:"emaillistboxName",label:"Enable Email",values:[{text:"True",value:"true"},{text:"False",value:"false"}]},{type:"listbox",name:"googlelistboxName",label:"Enable Google",values:[{text:"True",value:"true"},{text:"False",value:"false"}]},{type:"listbox",name:"pinterestlistboxName",label:"Enable Pinterest",values:[{text:"True",value:"true"},{text:"False",value:"false"}]}],onsubmit:function(t){e.insertContent('[share_social twitter="'+t.data.twitterlistboxName+'" facebook="'+t.data.facebooklistboxName+'" email="'+t.data.emaillistboxName+'" google="'+t.data.googlelistboxName+'" pinterest="'+t.data.pinterestlistboxName+'" share="'+t.data.sharelistboxName+'" share_text="'+t.data.shareTexttextboxName+'" border_round="'+t.data.borderRoundlistboxName+'" icon_color="'+t.data.iconColortextboxName+'" icon_color_hover="'+t.data.iconColorHovertextboxName+'"]')}})}},{text:"Separator",onclick:function(){e.windowManager.open({title:"Insert Separator Shortcode",body:[{type:"listbox",name:"color",label:"Border Color",values:[{text:"Blue",value:"blue"},{text:"Turquoise",value:"turquoise"},{text:"Pink",value:"pink"},{text:"Violet",value:"violet"},{text:"Peacoc",value:"peacoc"},{text:"Chino",value:"chino"},{text:"Mulled Wine",value:"mulled_wine"},{text:"Vista Blue",value:"vista_blue"},{text:"Black",value:"black"},{text:"Grey",value:"grey"},{text:"Orange",value:"orange"},{text:"Sky",value:"sky"},{text:"Green",value:"green"},{text:"Juicy Pink",value:"juicy_pink"},{text:"Sandy Brown",value:"sandy_brown"},{text:"Purple",value:"purple"},{text:"White",value:"white"},{text:"Custom Color",value:"custom"}]},{type:"textbox",name:"accentcolor",label:"Border Accent Color (can use when you choose custom color)",value:"#1e73be"},{type:"listbox",name:"elementwidth",label:"Border Width",values:[{text:"100%",value:"100"},{text:"90%",value:"90"},{text:"80%",value:"80"},{text:"70%",value:"70"},{text:"60%",value:"60"},{text:"50%",value:"50"},{text:"40%",value:"40"},{text:"30%",value:"30"},{text:"20%",value:"20"},{text:"10%",value:"10"}]},{type:"listbox",name:"position",label:"Border Position",values:[{text:"Left",value:"left"},{text:"Center",value:"center"},{text:"Right",value:"right"}]},{type:"textbox",name:"size",label:"Border Size",value:"2px"},{type:"listbox",name:"borderstyle",label:"Border Style",values:[{text:"Border",value:""},{text:"Dashed",value:"dashed"},{text:"Double",value:"double"},{text:"Dotted",value:"dotted"}]},{type:"textbox",name:"height",label:"Border Height",value:"3px"},{type:"textbox",name:"padding",label:"Border Padding",value:"28px"}],onsubmit:function(t){e.insertContent('[vc_separator style="'+t.data.borderstyle+'" height="'+t.data.height+'" color="'+t.data.color+'" accent_color="'+t.data.accentcolor+'" el_width="'+t.data.elementwidth+'" border_size="'+t.data.size+'" padding="'+t.data.padding+'" position="'+t.data.position+'"]')}})}},{text:"Separator with text",onclick:function(){e.windowManager.open({title:"Insert Separator Text Shortcode",body:[{type:"listbox",name:"color",label:"Border Color",values:[{text:"Blue",value:"blue"},{text:"Turquoise",value:"turquoise"},{text:"Pink",value:"pink"},{text:"Violet",value:"violet"},{text:"Peacoc",value:"peacoc"},{text:"Chino",value:"chino"},{text:"Mulled Wine",value:"mulled_wine"},{text:"Vista Blue",value:"vista_blue"},{text:"Black",value:"black"},{text:"Grey",value:"grey"},{text:"Orange",value:"orange"},{text:"Sky",value:"sky"},{text:"Green",value:"green"},{text:"Juicy Pink",value:"juicy_pink"},{text:"Sandy Brown",value:"sandy_brown"},{text:"Purple",value:"purple"},{text:"White",value:"white"},{text:"Custom Color",value:"custom"}]},{type:"textbox",name:"accentcolor",label:"Border Accent Color (can use when you choose custom color)",value:"#1e73be"},{type:"listbox",name:"elementwidth",label:"Border Width",values:[{text:"100%",value:"100"},{text:"90%",value:"90"},{text:"80%",value:"80"},{text:"70%",value:"70"},{text:"60%",value:"60"},{text:"50%",value:"50"},{text:"40%",value:"40"},{text:"30%",value:"30"},{text:"20%",value:"20"},{text:"10%",value:"10"}]},{type:"listbox",name:"position",label:"Border Position",values:[{text:"Left",value:"left"},{text:"Center",value:"center"},{text:"Right",value:"right"}]},{type:"textbox",name:"size",label:"Border Size",value:"2px"},{type:"listbox",name:"borderstyle",label:"Border Style",values:[{text:"Border",value:""},{text:"Dashed",value:"dashed"},{text:"Double",value:"double"},{text:"Dotted",value:"dotted"}]},{type:"textbox",name:"height",label:"Border Height",value:"3px"},{type:"textbox",name:"padding",label:"Border Padding",value:"28px"},{type:"textbox",name:"title",label:"Title",value:"Separator"},{type:"listbox",name:"titleAlign",label:"Title Alignment",values:[{text:"Left",value:"separator_align_left"},{text:"Center",value:"separator_align_center"},{text:"Right",value:"separator_align_right"}]}],onsubmit:function(t){e.insertContent('[vc_text_separator title="'+t.data.title+'" title_align="'+t.data.titleAlign+'" style="'+t.data.borderstyle+'" height="'+t.data.height+'" color="'+t.data.color+'" accent_color="'+t.data.accentcolor+'" el_width="'+t.data.elementwidth+'" border_size="'+t.data.size+'" padding="'+t.data.padding+'" position="'+t.data.position+'"]')}})}},{text:"All Slider",onclick:function(){e.windowManager.open({title:"Insert All Slider Shortcode",body:[{type:"textbox",name:"dfslidercount",label:"How many items ?",value:"1"}],onsubmit:function(t){e.insertContent("[df_slider]");for(i=0;i<t.data.dfslidercount;i++){e.insertContent("[df_slider_item]content[/df_slider_item]")}e.insertContent("[/df_slider]")}})}},{text:"Button",onclick:function(){e.windowManager.open({title:"Insert Button Shortcode",body:[{type:"textbox",name:"font_color",label:"Font Color",value:"#ffffff"},{type:"textbox",name:"color",label:"Button Color",value:"#dddddd"},{type:"textbox",name:"color_hover",label:"Button Hover Color",value:"#0f0f0f"},{type:"listbox",name:"button_size",label:"Button Size",values:[{text:"Mini",value:"xs"},{text:"Small",value:"sm"},{text:"Normal",value:"md"},{text:"Large",value:"lg"}]},{type:"listbox",name:"button_position",label:"Button Position",values:[{text:"Left",value:""},{text:"Center",value:"btn_position_center"},{text:"Right",value:"btn_position_right"}]},{type:"textbox",name:"title",label:"Button Title",value:"Button"},{type:"textbox",name:"link",label:"Button Link",value:"http://example.com/"},{type:"textbox",name:"link_title",label:"Button Link Title",value:"example"},{type:"listbox",name:"target_link",label:"Button Target Link",values:[{text:"Open in new tab",value:"_blank"},{text:"Open in current tab",value:"_self"}]}],onsubmit:function(t){e.insertContent('[df_button title="'+t.data.title+'" font_color='+t.data.font_color+" color="+t.data.color+" color_hover="+t.data.color_hover+' link="'+t.data.link+'" target="'+t.data.target_link+'" link_title="'+t.data.link_title+'" btn_size='+t.data.button_size+" btn_position="+t.data.button_position+"]")}})}}]},{text:"Typography",menu:[{text:"Dropcap",onclick:function(){e.windowManager.open({title:"Insert Dropcap Shortcode",body:[{type:"listbox",name:"size",label:"Size",values:[{text:"Normal",value:"normal"},{text:"Bold",value:"bold"}]},{type:"textbox",name:"background_color",label:"Background Color",value:"#eeeeee"},{type:"textbox",name:"color",label:"Color",value:"#0f0f0f"},{type:"textbox",name:"content",label:"Content",value:"Hello",multiline:true,minWidth:300,minHeight:100}],onsubmit:function(t){e.insertContent('[dropcap size="'+t.data.size+'" background_color="'+t.data.background_color+'" color="'+t.data.color+'"]'+t.data.content+"[/dropcap]")}})}},{text:"Highlight",onclick:function(){e.windowManager.open({title:"Insert Highlight Shortcode",body:[{type:"textbox",name:"background",label:"Background Color",value:"#eeeeee"},{type:"textbox",name:"color",label:"Color",value:"#0f0f0f"},{type:"textbox",name:"content",label:"Content",value:"Hello",multiline:true,minWidth:300,minHeight:100}],onsubmit:function(t){e.insertContent('[highlight_sty background="'+t.data.background+'" color="'+t.data.color+'"]'+t.data.content+"[/highlight_sty]")}})}},{text:"List Item",onclick:function(){e.windowManager.open({title:"Insert List Shortcode",body:[{type:"textbox",name:"listcount",label:"How many items ?",value:"1"},{type:"textbox",name:"icon",label:"What icon you want use ?",value:"fa-"}],onsubmit:function(t){e.insertContent("[list]");for(i=0;i<t.data.listcount;i++){e.insertContent('[list_item icon="'+t.data.icon+'"]content[/list_item]')}e.insertContent("[/list]")}})}},{text:"Block Quote",onclick:function(){e.windowManager.open({title:"Insert Block Quote Shortcode",body:[{type:"listbox",name:"version",label:"Version",values:[{text:"Version 1",value:"1"},{text:"Version 2",value:"2"}]},{type:"textbox",name:"color",label:"Color",value:"#0f0f0f"},{type:"textbox",name:"border_size",label:"Border Size",value:"2px"},{type:"textbox",name:"content",label:"Content",value:"Hello",multiline:true,minWidth:300,minHeight:100}],onsubmit:function(t){e.insertContent('[blockquote_sty ver="'+t.data.version+'" color="'+t.data.color+'" border_size="'+t.data.border_size+'"]'+t.data.content+"[/blockquote_sty]")}})}},{text:"Google Font",onclick:function(){e.windowManager.open({title:"Insert Block Quote Shortcode",body:[{type:"textbox",name:"font",label:"Google Font Type",value:"Open Sans"},{type:"textbox",name:"fontsize",label:"Google Font Size",value:"14px"},{type:"textbox",name:"color",label:"Font Color",value:"#0f0f0f"},{type:"textbox",name:"margin",label:"Margin",value:"0px"},{type:"listbox",name:"textfloat",label:"Float",values:[{text:"None",value:"none"},{text:"Left",value:"left"},{text:"Right",value:"right"}]},{type:"textbox",name:"lineheight",label:"Line Height",value:"1.571"},{type:"listbox",name:"align",label:"Text Alignment",values:[{text:"Center",value:"center"},{text:"Left",value:"left"},{text:"Right",value:"right"}]},{type:"listbox",name:"fontweight",label:"Font Weight",values:[{text:"Extra Light",value:"100"},{text:"Light",value:"200"},{text:"Book",value:"300"},{text:"Regular",value:"400"},{text:"Medium",value:"500"},{text:"Semibold",value:"600"},{text:"Bold",value:"700"},{text:"Extra Bold",value:"800"},{text:"Ultra Bold",value:"900"}]},{type:"textbox",name:"text",label:"Text",value:"Hello",multiline:true,minWidth:300,minHeight:100}],onsubmit:function(t){e.insertContent('[googlefont font="'+t.data.font+'" size="'+t.data.fontsize+'" margin="'+t.data.margin+'" color="'+t.data.color+'" float="'+t.data.textfloat+'" line_height="'+t.data.lineheight+'" align="'+t.data.align+'" font_weight="'+t.data.fontweight+'"]'+t.data.text+"[/googlefont]")}})}},{text:"Tooltip",onclick:function(){e.windowManager.open({title:"Insert Tooltip Shortcode",body:[{type:"textbox",name:"color",label:"Tooltip Text Color",value:"#999999"},{type:"textbox",name:"bg_color",label:"Tooltip Background Color",value:"#0f0f0f"},{type:"textbox",name:"text",label:"Text",value:"Hello",multiline:true,minWidth:300,minHeight:100},{type:"textbox",name:"url",label:"Tooltip Link",value:"http://"},{type:"listbox",name:"target",label:"Tooltip Link Target",values:[{text:"Open new tab",value:"_blank"},{text:"Open in current tab",value:"_self"}]},{type:"textbox",name:"tooltiptext",label:"Tooltip Text",value:"Hello",multiline:true,minWidth:300,minHeight:100}],onsubmit:function(t){e.insertContent('[tooltip text="'+t.data.text+'" link="'+t.data.url+'" tooltip="'+t.data.tooltiptext+'" target="'+t.data.target+'" color="'+t.data.color+'" bg_color="'+t.data.bg_color+'"]')}})}}]},{text:"Plugin",menu:[{text:"Hotel Reservation Landscape",onclick:function(){e.insertContent("[booking_form_landscape]")}}]}]})})})(jQuery)
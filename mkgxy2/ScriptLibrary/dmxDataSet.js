/*
HTML5 Data Bindings
Version: 1.7.1
(c) 2015 DMXzone.com
@build 2015-02-25 11:50:04
*/
!function(a){function b(){console&&console.error&&console.error.apply(console,arguments)}function c(b,e,f){if(e=e||d.globalScope,"string"==typeof b){var g;return(g=/\{\{(.+?)\}\}/.exec(b))&&g[0]==b?(e.watch(b,f),d.$parse(b,e)):d.$parseTemplate(b,e,f)}return(a.isPlainObject(b)||a.isArray(b))&&a.each(b,function(a){b[a]=c(b[a],e,function(c){b[a]=c,f(c)})}),b}if(!a.dmxDataBindings)return void alert("DMXzone Data Bindings is required!");var d=a.dmxDataBindings,e=function(c){return c?c.id?this instanceof e?(this.cfg=a.extend({preventInitialLoad:!1,callback:null},c),this.id=c.id,this.data={},this.state="loading",void this.init()):new e(c):(b("ID for dataset is required!"),!1):(b("No options are set for dataset!",this,c),!1)};a.extend(e,{get:function(a){return e.dataSets[a]}}),e.dataSets={},e.prototype={init:function(){var b=this;e.dataSets[this.id]=this,this.fixCallbacks(),this.cfg.dataSet&&this.set(this.cfg.dataSet),this.cfg.url&&(this.cfg.data=c(this.cfg.data,d.globalScope,function(a){void 0!==a&&b.load()}),-1!=this.cfg.url.indexOf("{{")&&(this.cfg._url=this.cfg.url,this.cfg.url=d.$parseTemplate(this.cfg._url,d.globalScope,function(){b.load(!0)},"dataset:"+this.id),this.cfg.preventInitialLoad=!0),a.dmxSecurityProvider&&"database"==this.cfg.dataSourceType?d.globalScope.watch("$SECURITY",function(){b.load(!0)},"dataset:"+this.id,!0):this.cfg.preventInitialLoad||this.load())},fixCallbacks:function(){var b=this;a.each(["beforeSend","complete","error","unauthorized","forbidden","success","update","callback"],function(a,c){var d=b.cfg[c];"string"==typeof d&&(b.cfg[c]=function(){return new Function(d).call(),"undefined"!=typeof MM_returnValue&&null!==MM_returnValue?MM_returnValue:void 0})})},setPage:function(a){var b,c,d;if(this.data&&("database"==this.cfg.dataSourceType?(b=this.data.offset,c=this.data.limit,d=this.data.total):(this.data.data?(b=this.data.data.startIndex,c=this.data.data.itemsPerPage,d=this.data.data.totalItems):this.data.feed&&(b=this.data.feed.openSearch$startIndex.$t,c=this.data.feed.openSearch$itemsPerPage.$t,d=this.data.feed.openSearch$totalResults.$t),b&&(b-=1)),null!=b&&null!=c&&null!=d)){if("string"==typeof a)switch(a){case"first":a=0;break;case"prev":a=b-c;break;case"next":a=b+c;break;case"last":a=(Math.ceil(d/c)-1)*c}else a=(a-1)*c;0>a||a>=d||this.load("database"==this.cfg.dataSourceType?{data:{offset:a}}:{data:{"start-index":a+1}})}},load:function(b){var c=this;b===!0&&(this.cfg.data&&(delete this.cfg.data.offset,delete this.cfg.data["start-index"]),b={}),"string"==typeof b&&(b={url:b}),b&&""===b.url||(b&&b.url&&this.cfg._url&&(this.cfg.data&&(delete this.cfg.data.offset,delete this.cfg.data["start-index"]),d.globalScope.unwatchNS(this.cfg._url,"dataset:"+this.id),delete this.cfg._url),a.extend(!0,this.cfg,b),b&&b.url&&-1!=b.url.indexOf("{{")?(this.cfg._url=b.url,this.cfg.url=d.$parseTemplate(this.cfg._url,d.globalScope,function(){c.load(!0)},"dataset:"+this.id)):this.cfg._url&&(this.cfg.url=d.$parseTemplate(this.cfg._url)),a.ajax(this.cfg).done(function(b){c.set(c.cfg.root?b[c.cfg.root]:b),a.isFunction(c.cfg.callback)&&c.cfg.callback.call(this)}).fail(function(b){c.state="error",d.globalScope.remove(this.id),401==b.status?a.isFunction(c.cfg.unauthorized)&&c.cfg.unauthorized.call(this):402==b.status?a.isFunction(c.cfg.forbidden)&&c.cfg.forbidden.call(this):a.isFunction(c.cfg.error)&&c.cfg.error.call(this)}))},set:function(b){if("string"==typeof b)try{this.data=a.parseJSON(b),this.state="ready"}catch(c){return this.state="error",void(a.isFunction(this.cfg.error)&&this.cfg.error.call(this))}else this.data=b,this.state="ready";d.globalScope.add(this.id,this.data),a.isFunction(this.cfg.update)&&this.cfg.update.call(this)}},a.dmxDataSet=e}(jQuery);
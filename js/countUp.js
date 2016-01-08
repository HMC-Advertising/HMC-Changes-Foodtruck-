function countUp(e,t,n,r,i,s){this.options=s||{useEasing:true,useGrouping:true,separator:",",decimal:"."};var o=0;var u=["webkit","moz","ms"];for(var a=0;a<u.length&&!window.requestAnimationFrame;++a){window.requestAnimationFrame=window[u[a]+"RequestAnimationFrame"];window.cancelAnimationFrame=window[u[a]+"CancelAnimationFrame"]||window[u[a]+"CancelRequestAnimationFrame"]}if(!window.requestAnimationFrame){window.requestAnimationFrame=function(e,t){var n=(new Date).getTime();var r=Math.max(0,16-(n-o));var i=window.setTimeout(function(){e(n+r)},r);o=n+r;return i}}if(!window.cancelAnimationFrame){window.cancelAnimationFrame=function(e){clearTimeout(e)}}var f=this;this.d=typeof e==="string"?document.getElementById(e):e;this.startVal=Number(t);this.endVal=Number(n);this.countDown=this.startVal>this.endVal?true:false;this.startTime=null;this.timestamp=null;this.remaining=null;this.frameVal=this.startVal;this.rAF=null;this.decimals=Math.max(0,r||0);this.dec=Math.pow(10,this.decimals);this.duration=i*1e3||2e3;this.easeOutExpo=function(e,t,n,r){return n*(-Math.pow(2,-10*e/r)+1)*1024/1023+t};this.count=function(e){if(f.startTime===null)f.startTime=e;f.timestamp=e;var t=e-f.startTime;f.remaining=f.duration-t;if(f.options.useEasing){if(f.countDown){var n=f.easeOutExpo(t,0,f.startVal-f.endVal,f.duration);f.frameVal=f.startVal-n}else{f.frameVal=f.easeOutExpo(t,f.startVal,f.endVal-f.startVal,f.duration)}}else{if(f.countDown){var n=(f.startVal-f.endVal)*(t/f.duration);f.frameVal=f.startVal-n}else{f.frameVal=f.startVal+(f.endVal-f.startVal)*(t/f.duration)}}f.frameVal=Math.round(f.frameVal*f.dec)/f.dec;if(f.countDown){f.frameVal=f.frameVal<f.endVal?f.endVal:f.frameVal}else{f.frameVal=f.frameVal>f.endVal?f.endVal:f.frameVal}f.d.innerHTML=f.formatNumber(f.frameVal.toFixed(f.decimals));if(t<f.duration){f.rAF=requestAnimationFrame(f.count)}else{if(f.callback!=null)f.callback()}};this.start=function(e){f.callback=e;if(!isNaN(f.endVal)&&!isNaN(f.startVal)){f.rAF=requestAnimationFrame(f.count)}else{console.log("countUp error: startVal or endVal is not a number");f.d.innerHTML="--"}return false};this.stop=function(){cancelAnimationFrame(f.rAF)};this.reset=function(){f.startTime=null;cancelAnimationFrame(f.rAF);f.d.innerHTML=f.formatNumber(f.startVal.toFixed(f.decimals))};this.resume=function(){f.startTime=null;f.duration=f.remaining;f.startVal=f.frameVal;requestAnimationFrame(f.count)};this.formatNumber=function(e){e+="";var t,n,r,i;t=e.split(".");n=t[0];r=t.length>1?f.options.decimal+t[1]:"";i=/(\d+)(\d{3})/;if(f.options.useGrouping){while(i.test(n)){n=n.replace(i,"$1"+f.options.separator+"$2")}}return n+r};f.d.innerHTML=f.formatNumber(f.startVal.toFixed(f.decimals))}
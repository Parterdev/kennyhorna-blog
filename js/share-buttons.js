!function(b,m){"use strict";(new function(){var s=function(e,n){return e.replace(/\{(\d+)\}/g,function(e,t){return n[t]||e})},u=function(e){return e.join(" - ")};this.i=function(){var e,t=m.querySelectorAll(".share-btn");for(e=t.length;e--;)n(t[e])};var n=function(e){var t,n=e.querySelectorAll("a");for(t=n.length;t--;)r(n[t],{id:"",url:c(e),title:i(e),desc:a(e)})},r=function(e,t){t.id=l(e,"data-id"),t.id&&o(e,"click",t)},c=function(e){return l(e,"data-url")||location.href||" "},i=function(e){return l(e,"data-title")||m.title||" "},a=function(e){var t=m.querySelector("meta[name=description]");return l(e,"data-desc")||t&&l(t,"content")||" "},o=function(e,t,n){var r=function(){p(n.id,n.url,n.title,n.desc)};e.addEventListener?e.addEventListener(t,r):e.attachEvent("on"+t,function(){r.call(e)})},l=function(e,t){return e.getAttribute(t)},h=function(e){return encodeURIComponent(e)},p=function(e,t,n,r){var c=h(t),i=h(r),a=h(n),o=a||i||"";switch(e){case"fb":d(s("https://www.facebook.com/sharer/sharer.php?u={0}",[c]),n);break;case"vk":d(s("https://vk.com/share.php?url={0}&title={1}",[c,u([a,i])]),n);break;case"tw":d(s("https://twitter.com/intent/tweet?url={0}&text={1}",[c,u([a,i])]),n);break;case"tg":d(s("https://t.me/share/url?url={0}&text={1}",[c,u([a,i])]),n);break;case"pk":d(s("https://getpocket.com/edit?url={0}&title={1}",[c,u([a,i])]),n);break;case"re":d(s("https://reddit.com/submit/?url={0}",[c]),n);break;case"ev":d(s("https://www.evernote.com/clip.action?url={0}&t={1}",[c,a]),n);break;case"in":d(s("https://www.linkedin.com/shareArticle?mini=true&url={0}&title={1}&summary={2}&source={0}",[c,a,u([a,i])]),n);break;case"pi":d(s("https://pinterest.com/pin/create/button/?url={0}&media={0}&description={1}",[c,u([a,i])]),n);break;case"sk":d(s("https://web.skype.com/share?url={0}&source=button&text={1}",[c,u([a,i])]),n);break;case"wa":d(s("whatsapp://send?text={0}%20{1}",[u([a,i]),c]),n);break;case"ok":d(s("https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&service=odnoklassniki&st.shareUrl={0}",[c]),n);break;case"tu":d(s("https://www.tumblr.com/widgets/share/tool?posttype=link&title={0}&caption={0}&content={1}&canonicalUrl={1}&shareSource=tumblr_share_button",[u([a,i]),c]),n);break;case"hn":d(s("https://news.ycombinator.com/submitlink?t={0}&u={1}",[u([a,i]),c]),n);break;case"xi":d(s("https://www.xing.com/app/user?op=share;url={0};title={1}",[c,u([a,i])]),n);break;case"mail":0<a.length&&0<i.length&&(o=u([a,i])),0<o.length&&(o+=" / "),0<a.length&&(a+=" / "),location.href=s("mailto:?Subject={0}{1}&body={2}{3}",[a,n,o,c]);break;case"print":window.print()}},d=function(e,t){var n=void 0!==b.screenLeft?b.screenLeft:screen.left,r=void 0!==b.screenTop?b.screenTop:screen.top,c=(b.innerWidth||m.documentElement.clientWidth||screen.width)/2-300+n,i=(b.innerHeight||m.documentElement.clientHeight||screen.height)/3-400/3+r,a=b.open(e,"",s("resizable,toolbar=yes,location=yes,scrollbars=yes,menubar=yes,width={0},height={1},top={2},left={3}",[600,400,i,c]));null!==a&&a.focus&&a.focus()}}).i()}(window,document);
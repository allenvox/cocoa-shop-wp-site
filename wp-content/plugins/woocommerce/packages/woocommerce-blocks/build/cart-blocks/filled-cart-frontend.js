(window.webpackWcBlocksJsonp=window.webpackWcBlocksJsonp||[]).push([[26],{230:function(e,t){},272:function(e,t,s){"use strict";s.d(t,"b",(function(){return l})),s.d(t,"a",(function(){return o}));var c=s(0),a=s(10),i=s(5),r=s.n(i);const n=Object(c.createContext)({hasContainerWidth:!1,containerClassName:"",isMobile:!1,isSmall:!1,isMedium:!1,isLarge:!1}),l=()=>Object(c.useContext)(n),o=e=>{let{children:t,className:s=""}=e;const[i,l]=(()=>{const[e,{width:t}]=Object(a.useResizeObserver)();let s="";return t>700?s="is-large":t>520?s="is-medium":t>400?s="is-small":t&&(s="is-mobile"),[e,s]})(),o={hasContainerWidth:""!==l,containerClassName:l,isMobile:"is-mobile"===l,isSmall:"is-small"===l,isMedium:"is-medium"===l,isLarge:"is-large"===l};return Object(c.createElement)(n.Provider,{value:o},Object(c.createElement)("div",{className:r()(s,l)},i,t))}},283:function(e,t,s){"use strict";var c=s(0),a=s(5),i=s.n(a),r=s(272);s(230),t.a=e=>{let{children:t,className:s}=e;return Object(c.createElement)(r.a,{className:i()("wc-block-components-sidebar-layout",s)},t)}},446:function(e,t,s){"use strict";s.r(t);var c=s(0),a=s(5),i=s.n(a),r=s(283),n=s(36),l=s(21),o=s(4),m=s(163);t.default=e=>{let{children:t,className:s}=e;const{cartItems:a,cartIsLoading:u,cartItemErrors:b}=Object(n.a)(),{hasDarkControls:d}=Object(m.b)(),{createErrorNotice:h}=Object(o.useDispatch)("core/notices");return Object(c.useEffect)(()=>{b.forEach(e=>{h(Object(l.decodeEntities)(e.message),{isDismissible:!0,id:e.code,context:"wc/cart"})})},[h,b]),u||a.length>=1?Object(c.createElement)(r.a,{className:i()("wc-block-cart",s,{"has-dark-controls":d})},t):null}}}]);
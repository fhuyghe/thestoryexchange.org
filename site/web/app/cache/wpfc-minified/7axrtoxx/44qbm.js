window.addComment=(function(window){
var document=window.document;
var config={
commentReplyClass:'comment-reply-link',
cancelReplyId:'cancel-comment-reply-link',
commentFormId:'commentform',
temporaryFormId:'wp-temp-form-div',
parentIdFieldId:'comment_parent',
postIdFieldId:'comment_post_ID'
};
var MutationObserver=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver;
var cutsTheMustard='querySelector' in document&&'addEventListener' in window;
var supportsDataset = !! document.documentElement.dataset;
var cancelElement;
var commentFormElement;
var respondElement;
var observer;
if(cutsTheMustard&&document.readyState!=='loading'){
ready();
}else if(cutsTheMustard){
window.addEventListener('DOMContentLoaded', ready, false);
}
function ready(){
init();
observeChanges();
}
function init(context){
if(! cutsTheMustard){
return;
}
cancelElement=getElementById(config.cancelReplyId);
commentFormElement=getElementById(config.commentFormId);
if(! cancelElement){
return;
}
cancelElement.addEventListener('touchstart', cancelEvent);
cancelElement.addEventListener('click',      cancelEvent);
var links=replyLinks(context);
var element;
for(var i=0, l=links.length; i < l; i++){
element=links[i];
element.addEventListener('touchstart', clickEvent);
element.addEventListener('click',      clickEvent);
}}
function replyLinks(context){
var selectorClass=config.commentReplyClass;
var allReplyLinks;
if(! context||! context.childNodes){
context=document;
}
if(document.getElementsByClassName){
allReplyLinks=context.getElementsByClassName(selectorClass);
}else{
allReplyLinks=context.querySelectorAll('.' + selectorClass);
}
return allReplyLinks;
}
function cancelEvent(event){
var cancelLink=this;
var temporaryFormId=config.temporaryFormId;
var temporaryElement=getElementById(temporaryFormId);
if(! temporaryElement||! respondElement){
return;
}
getElementById(config.parentIdFieldId).value='0';
temporaryElement.parentNode.replaceChild(respondElement ,temporaryElement);
cancelLink.style.display='none';
event.preventDefault();
}
function clickEvent(event){
var replyLink=this,
commId=getDataAttribute(replyLink, 'belowelement'),
parentId=getDataAttribute(replyLink, 'commentid'),
respondId=getDataAttribute(replyLink, 'respondelement'),
postId=getDataAttribute(replyLink, 'postid'),
follow;
if(! commId||! parentId||! respondId||! postId){
return;
}
follow=window.addComment.moveForm(commId, parentId, respondId, postId);
if(false===follow){
event.preventDefault();
}}
function observeChanges(){
if(! MutationObserver){
return;
}
var observerOptions={
childList: true,
subTree: true
};
observer=new MutationObserver(handleChanges);
observer.observe(document.body, observerOptions);
}
function handleChanges(mutationRecords){
var i=mutationRecords.length;
while(i--){
if(mutationRecords[ i ].addedNodes.length){
init();
return;
}}
}
function getDataAttribute(element, attribute){
if(supportsDataset){
return element.dataset[attribute];
}else{
return element.getAttribute('data-' + attribute);
}}
function getElementById(elementId){
return document.getElementById(elementId);
}
function moveForm(addBelowId, commentId, respondId, postId){
var addBelowElement=getElementById(addBelowId);
respondElement=getElementById(respondId);
var parentIdField=getElementById(config.parentIdFieldId);
var postIdField=getElementById(config.postIdFieldId);
var element, cssHidden, style;
if(! addBelowElement||! respondElement||! parentIdField){
return;
}
addPlaceHolder(respondElement);
if(postId&&postIdField){
postIdField.value=postId;
}
parentIdField.value=commentId;
cancelElement.style.display='';
addBelowElement.parentNode.insertBefore(respondElement, addBelowElement.nextSibling);
cancelElement.onclick=function(){
return false;
};
try {
for(var i=0; i < commentFormElement.elements.length; i++){
element=commentFormElement.elements[i];
cssHidden=false;
if('getComputedStyle' in window){
style=window.getComputedStyle(element);
}else if(document.documentElement.currentStyle){
style=element.currentStyle;
}
if(( element.offsetWidth <=0&&element.offsetHeight <=0)||style.visibility==='hidden'){
cssHidden=true;
}
if('hidden'===element.type||element.disabled||cssHidden){
continue;
}
element.focus();
break;
}}
catch(e){
}
return false;
}
function addPlaceHolder(respondElement){
var temporaryFormId=config.temporaryFormId;
var temporaryElement=getElementById(temporaryFormId);
if(temporaryElement){
return;
}
temporaryElement=document.createElement('div');
temporaryElement.id=temporaryFormId;
temporaryElement.style.display='none';
respondElement.parentNode.insertBefore(temporaryElement, respondElement);
}
return {
init: init,
moveForm: moveForm
};})(window);
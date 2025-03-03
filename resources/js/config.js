
import { funcApi } from './common/utilities/apiFunctions';
function getMetaContent(metaName) {
    const metaElement = document.querySelector(`meta[name="${metaName}"]`);
    return metaElement ? metaElement.getAttribute("content") : null;
}
function getValue(id) {
    const element = document.getElementById(id);
    return element ? element.value :null;
}
const csrf = getMetaContent("_token");
const appName = getMetaContent("app-name");``
const cdnUrl = getMetaContent("cdnUrl");
const appUrl = getMetaContent("appUrl");
const appEnv = getMetaContent("appEnv");
const accessToken = getValue("accessToken");
const authUserJson = getValue("authUser");



if(authUserJson )
{
     funcApi.storeObject('authUser',JSON.parse(authUserJson));
    
}
if(accessToken)
{
    localStorage.setItem('accessToken', accessToken);
}else{
    const tokenExist =   localStorage.getItem('accessToken');
    if(!tokenExist 
        && location.href.split('/').pop() != 'login' 
        && location.href.split('/').pop() != 'register' 
        && !location.href.includes('invitation')  
        && !location.href.includes('verify')  
        && !location.href.includes('password'))
    {
        logout();
    }

}

export { csrf, appName, cdnUrl, appUrl,appEnv };

export default class EditorUtils{
    static oDoc;
    static sDefTxt;
    static initDoc() {
        EditorUtils.oDoc = document.getElementById("textBox");
        EditorUtils.sDefTxt = EditorUtils.oDoc.innerHTML;
        document.getElementById("format-block").addEventListener("change",function (){
            EditorUtils.formatDoc('formatblock',this[this.selectedIndex].value);this.selectedIndex=0;
        });
        document.getElementById("font-name").addEventListener("change",function (){
            EditorUtils.formatDoc('fontname',this[this.selectedIndex].value);this.selectedIndex=0;
        });
        document.getElementById("font-size").addEventListener("change",function (){
            EditorUtils.formatDoc('fontsize',this[this.selectedIndex].value);this.selectedIndex=0;
        });
        document.getElementById("forecolor").addEventListener("change",function (){
            EditorUtils.formatDoc('forecolor',this[this.selectedIndex].value);this.selectedIndex=0;
        });
        document.getElementById("backcolor").addEventListener("change",function (){
            EditorUtils.formatDoc('backcolor',this[this.selectedIndex].value);this.selectedIndex=0;
        });
        document.getElementById("bold").addEventListener("click",function (){
            EditorUtils.formatDoc('bold');
        });
        document.getElementById("italic").addEventListener("click",function (){
            EditorUtils.formatDoc('italic');
        });
        document.getElementById("underline").addEventListener("click",function (){
            EditorUtils.formatDoc('underline');
        });
        document.getElementById("lAlign").addEventListener("click",function (){
            EditorUtils.formatDoc('justifyleft');
        });
        document.getElementById("cAlign").addEventListener("click",function (){
            EditorUtils.formatDoc('justifycenter');
        });
        document.getElementById("rAlign").addEventListener("click",function (){
            EditorUtils.formatDoc('justifyright');
        });
        document.getElementById("o-list").addEventListener("click",function (){
            EditorUtils.formatDoc('insertorderedlist');
        });
        document.getElementById("u-list").addEventListener("click",function (){
            EditorUtils.formatDoc('insertunorderedlist');
        });

        document.getElementById("link").addEventListener("click",function (){
            let sLnk = prompt('Write the URL here', 'http:\/\/');
            if (sLnk && sLnk !== '' && sLnk !== 'http://') {
                EditorUtils.formatDoc('createlink', sLnk)
            }
        });

    }
    static formatDoc(sCmd, sValue) {
        document.execCommand(sCmd, false, sValue);
        EditorUtils.oDoc.focus();
    }
}






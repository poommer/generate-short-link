function copyToClipboard(text) {
  var textarea = document.createElement("textarea");
  textarea.value = text;
  document.body.appendChild(textarea);
  textarea.select();
  document.execCommand("copy");
  document.body.removeChild(textarea);
}

function isURL(text) {
  // Regular Expression สำหรับตรวจสอบ URL
  var urlPattern = /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/i;

  // ตรวจสอบว่าข้อความตรงกับรูปแบบ URL หรือไม่
  return urlPattern.test(text);
}

function createBox(response,link){
    const DivBox = $('<div>').attr('class', 'box');
            const DivGroup = $('<div>').attr('class', 'group');
            const DivShow = $('<div>').attr('class', 'show-newUrl');
            const DivGroupCopy = $('<div>').attr('class', 'group-copy');


            const heading2 = $('<h2>').attr('style', 'color: #003e6e;');
            const pUnder = $('<p>').attr('class', 'under-tip');

            const aNew = $('<a>').attr('id', 'newUrl');
            const lNew = $('<a>').attr('id', 'longUrl');

            const btn = $('<button>').attr('id', 'copyURL');

            const iconCopy = $('<img>').attr('src', 'copy_all_FILL0_wght400_GRAD0_opsz24.svg');

            btn.attr('class','copyURL')
            btn.attr('type','button')
            
            iconCopy.attr('id','bg-btnCopy')

            heading2.text('your Short link URL:')

            aNew.text(response);
            aNew.attr('href',response);
            aNew.attr('target','response');
            lNew.text(link);
            lNew.attr('href',link);
            lNew.attr('target','_blank');
            

            $('main').append(DivBox);

            $(DivBox).append(heading2);
            $(DivBox).append(DivGroup);
            $(DivBox).append($('<div>'));

            $(DivGroup).append(DivShow);
            $(DivGroup).append(pUnder);

            $(DivShow).append(aNew);
            $(DivShow).append(DivGroupCopy);

            $(DivGroupCopy).append(btn);
            $(btn).append(iconCopy);

            $(pUnder).text('long URL: ');
            $(pUnder).append(lNew);
}

$(document).ready(function () {
  $("#genURL").click(function (e) {
    $('.copied').remove();
    const link = $("#URL").val();
    if (link != "" && isURL(link)) {
      $.ajax({
        type: "post",
        url: "back-end/genUrl.php",
        data: {
          oldLink: link,
        },
        success: function (response) {
          if (response === '1') {
            $("#URL").addClass("inp-error");
            $("#msg").html(
              "Your url link has been shortened."
            );
          } else if(response === '0'){
            $("#URL").addClass("inp-error");
            $("#msg").html(
              "an error occurred please try again."
            );
          }else{
            $('.box').remove();
            createBox(response,link)

          }
        },
      });
    } 
    
    else {
      $("#URL").addClass("inp-error");
      $("#msg").html("*Please enter a valid URL link.  eg.https://example.com");
    }
  });

  $("#URL").keyup(function (e) {
    $("#URL").removeClass("inp-error");
    $("#URL").removeClass("inp-success");
    $("#msg").text("");
  });

  $(document).on('click', '#copyURL', function (e) {
    copyToClipboard($("#newUrl").text().trim());
    const DivMsgCopied = $('<p>').attr('class', 'copied');

    DivMsgCopied.text('copied!');

    $('.show-newUrl').before(DivMsgCopied);
});
});

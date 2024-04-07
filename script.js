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

$(document).ready(function () {
  $("#genURL").click(function (e) {
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
            const DivBox = $('<div>').attr('class', 'box');
            const DivGroup = $('<div>').attr('class', 'group');
            
          $("#newUrl").text(response);
          $("#newUrl").attr('href',response);
          $("#longUrl").text(link);
          $("#longUrl").attr('href',link);
          $('#URL').val('')

          $('#copyURL').addClass('copied');
          $('#bg-btnCopy').attr('href', 'done_FILL0_wght400_GRAD0_opsz24.svg');
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

  $("#copyURL").click(function (e) {
    e.preventDefault();

    console.log(copyToClipboard($("#newUrl").text().trim()));
  });
});

$(function() {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  $(".todo-status-button").change(function () {//todo-status-buttonに変更があった時=チェックボックスつけたり外したり
    const content = $(this).val();//$(this)は変更されたチェックボックスのタグ
    const url = $(this).parent(".todo-status-form").attr("action");

    $.ajax(//非同期通信をするための記述
      url,
      {
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken }
      }
    )
    .done(function(data) {
      // console.log(data);
      if (data.is_completed) {
        window.alert('「' + content + '」のToDoを完了にしました。');
      } else {
        window.alert('「' + content + '」のToDoの完了を取り消しました。');
      }
    })
    .fail(function() {
      window.alert('通信に失敗しました。');
    });
  });
});

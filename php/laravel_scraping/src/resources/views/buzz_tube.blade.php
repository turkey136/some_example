<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BuzzTube 昨日は何がバズった？</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.0/main.min.css' rel='stylesheet' />
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 100vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 90%;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
                margin-top: 100px
            }
            .thumbnail {
              width: 100%;
              aspect-ratio: 16 / 9;
            }
        </style>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.0/main.min.js'></script>
        <script>
          var json = {
            'tmp': {
              url: 'https://www.youtube.com/watch?v=zazoKphTfSU&ab_channel=%E3%81%9F%E3%81%84%E3%81%9F%E3%81%AC',
              c_name: 'ほげ',
            },
            'tmp2': {
              url: 'https://www.youtube.com/watch?v=NvweSp7xRic',
              c_name: 'ふが',
            }
          };

          document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth',
              locale: 'ja',
              events: [
                {
                  start: '2022-08-10',
                  textColor: '#000000',
                  title: 'tmp'
                },
                 {
                  start: '2022-08-13',
                  textColor: '#000000',
                  title: 'tmp2'
                }
              ],
              eventColor: '#FFFFFF',
              eventContent: function (info) {
                console.log(info.event.title)
                var data = json[info.event.title]
                console.log(data)
                var video_id = data['url'].replace(/https:\/\/.+\?v=/, '').replace(/&.+/, '');
                return {
                  html: '<img src="https://img.youtube.com/vi/' + video_id + '/default.jpg" class="thumbnail"/>' +
                  '<div>' + info.event.title + '</div>'
                }
              }
            });
            calendar.render();
          });
        </script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    BuzzTube 昨日は何がバズった？
                </div>
                <div id='calendar'></div>
            </div>
        </div>
    </body>
</html>

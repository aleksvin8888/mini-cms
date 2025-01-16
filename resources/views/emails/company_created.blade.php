
<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{config("app.name")}}</title>
</head>
<body style=" margin: 0;
            background-color: #f1f0f7;
            box-sizing: border-box;
            padding: 48px;">
<table style="  width: 100%;
            max-width: 800px;
            margin: 0 auto;
            border-collapse: collapse;">
    <tr>
        <td style="padding: 40px;">
            <h2 style=" margin-bottom: 16px;
            font-family: Inter, Arial, sans-serif;
            font-size: 30px;
            font-weight: 500;
            line-height: 32px;
            text-align: left;
            color: #1e1f22;">
                A new company has been created:
            </h2>
        </td>

        <td style="padding: 40px;">
            <p style=" margin-bottom: 16px;
            font-family: Inter, Arial, sans-serif;
            font-size: 24px;
            font-weight: 500;
            line-height: 32px;
            text-align: left;
            color: #1e1f22;">Name: {{$companyName}}</p>
            <p style=" margin-bottom: 16px;
            font-family: Inter, Arial, sans-serif;
            font-size: 24px;
            font-weight: 500;
            line-height: 32px;
            text-align: left;
            color: #1e1f22;">Email: {{$companyEmail}} </p>

        </td>
</table>
</body>
</html>

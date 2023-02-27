<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <link href="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.css" rel="stylesheet">

    <title>Панель для менеджера</title>

    <link rel="icon" type="image/png" href="/images/admin/favicon.png">

    <style>

        button {
            outline: 0;
            border: 0;
            background: unset;
        }

        .input-group-text {
            border-radius: 0;
        }

        .form-group {
            margin-top: 10px;
        }

        a {
            text-decoration: unset;
        }

        table button {
            margin-right: 10px;
        }

        .fixed-table-body {
            height: unset !important;
        }

        .alert {
            padding: 5px;
            margin: auto;

            color: white;
            border: unset;
            text-align: center;
            font-size: 14px;
        }

        label {
            margin-bottom: 5px;
        }

    </style>

</head>

<body class="relative">

<div class="container">
    <div class="table-container">
        <table
            data-search="true"
            data-toggle="table"
            data-url="/admin/contacts"
            data-pagination="true"
            data-side-pagination="server"
            data-total-field="total"
            data-data-field="data"
        >
            <thead>
            <tr>
                <th data-field="id" scope="col">#</th>
                <th data-field="name" scope="col">Название</th>
                <th data-field="phone" scope="col">Номер</th>
                <th data-field="email" scope="col">Почта</th>
                <th data-formatter="tableUrl" scope="col">Ссылка</th>
                <th data-formatter="tableStatus" scope="col">Статус</th>
                <th data-formatter="tableActions" scope="col">Действия</th>
            </tr>
            </thead>
        </table>

        <button data-toggle="modal" data-target="#create-card-modal" type="button" class="btn btn-primary">Добавить карточку</button>

    </div>

    <div class="modals">

        @include('admin.modals.create-contact-modal')
        @include('admin.modals.edit-contact-modal')
        @include('admin.modals.delete-contact-modal')

    </div>

</div>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script src="https://unpkg.com/bootstrap-table@1.21.2/dist/bootstrap-table.min.js"></script>

<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

<script>

    window.editContactId = null

    let statuses = [
        'Не звонили', //черный
        'Скинуть КП', //желтый
        'Перезвонить', //зеленый
        'Ждать звонка', //фиолетовый
        'Долгий ящик', //фиолетовый
        'Обработан', //серый
    ]

    let backgroundColors = [
        'black',
        'green',
        'purple',
        '#bcbc31',
        'orange',
        'gray'
    ]

    let textColors = [
        'white',
        'white',
        'white',
        'white',
        'white',
        'white',
    ]

    function tableActions(value, row, index) {
        return [
            `<button onclick="editContact(${row.id})" class="btn btn-secondary btn-sm change">Изменить</button>`,
            `<button onclick="deleteContact(${row.id})" class="btn btn-danger btn-sm delete">Удалить</button>`,
        ].join('');
    }

    function tableUrl(value, row, index) {
        return [
            `<a target="_blank" href="${row.url}">${row.url}</a>`,
        ].join('');
    }

    function tableStatus(value, row, index) {
        let status = statuses[row.status]
        let backgroundColor = backgroundColors[row.status]
        let textColor = textColors[row.status]

        return [
            `<div class="alert alert-primary alert-dismissible" data-toggle="${row.desc ? 'tooltip' : ''}" data-placement="top" title="${row.desc}" style="background-color: ${backgroundColor}; color: ${textColor};">${status}</div>`,
        ].join('');
    }

    $('#create-contact-button').on('click', () => {

        let data = $('#create-contact-form').serializeArray()

        let requestData = {
            url: "/admin/contacts/create",
            type: 'post',
            data,
        }

        $.ajax(requestData)
            .done(response => {
                $('#create-card-modal').modal('hide')
                $('table').bootstrapTable('refresh')

                $('#create-card-modal input[name="name"]').val('')
                $('#create-card-modal input[name="phone"]').val('')
                $('#create-card-modal input[name="email"]').val('')
                $('#create-card-modal input[name="url"]').val('')
                $('#create-card-modal select[name="status"]').val(0).change()
                $('#create-card-modal textarea[name="desc"]').val('')
            })
    })

    $('#edit-contact-button').on('click', () => {
        let data = $('#edit-contact-form').serializeArray()

        let requestData = {
            url: `/admin/contacts/${window.editContactId}/edit`,
            type: 'post',
            data,
        }

        $.ajax(requestData)
            .done(response => {
                $('#edit-card-modal').modal('hide')
                $('table').bootstrapTable('refresh')
            })
    })

    $('#delete-contact-button').on('click', () => {
        let requestData = {
            url: `/admin/contacts/${window.editContactId}/delete`,
            type: 'post',
        }

        $.ajax(requestData)
            .done(response => {
                $('#delete-card-modal').modal('hide')
                $('table').bootstrapTable('refresh')
            })
    })

    function editContact(id) {
        window.editContactId = id

        let requestData = {
            url: `/admin/contacts/${id}`,
            method: 'get'
        }

        $.ajax(requestData)
            .done(response => {
                $('#edit-card-modal input[name="name"]').val(response.name)
                $('#edit-card-modal input[name="phone"]').val(response.phone)
                $('#edit-card-modal input[name="email"]').val(response.email)
                $('#edit-card-modal input[name="url"]').val(response.url)
                $('#edit-card-modal select[name="status"]').val(response.status).change()
                $('#edit-card-modal textarea[name="desc"]').val(response.desc)
                $('#edit-card-modal input[name="created_at"]').val(response.created_at)

                $('#edit-card-modal').modal('show')
            })

    }

    function deleteContact(id) {
        window.editContactId = id

        $('#delete-card-modal').modal('show')
    }

    setInterval(() => {
        $("[data-toggle='tooltip']").tooltip()
    }, 500)

</script>

</body>

</html>

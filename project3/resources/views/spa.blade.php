<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Подключаем Bootstrap, чтобы не работать над дизайном проекта -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    @verbatim
    <div id="app">
        <div class="container mt-5">
            <h1>Список книг нашей библиотеки</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Название</th>
                        <th scope="col">Автор</th>
                        <th scope="col">Наличие</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(book, index) in booksArr">
                        <th scope="row">{{ index+1 }}</th>
                        <td>{{ book['title'] }}</td>
                        <td>{{ book['author'] }}</td>
                        <td>
                            <button v-if="book['availability']" type="button" class="btn btn-outline-primary" v-on:click="changeBookAvailability(index+1)">
                                Доступна
                            </button>
                            <button v-else type="button" class="btn btn-outline-primary" v-on:click="changeBookAvailability(index+1)">
                                Выдана
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-danger" v-on:click="deleteBook(index+1)">
                                Удалить
                            </button>
                        </td>
                    </tr>

                    <!-- Строка с полями для добавления новой книги -->
                    <tr>
                        <th scope="row">Добавить</th>
                        <td><input type="text" class="form-control" v-model="form['title']"></td>
                        <td><input type="text" class="form-control" v-model="form['author']"></td>
                        <td></td>
                        <td>
                            <button type="button" class="btn btn-outline-success" v-on:click="addBook()">
                                Добавить
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!--Подключаем axios для выполнения запросов к api -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

    <!--Подключаем Vue.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js"></script>

    <script>
        let vm = new Vue({
            el: '#app',
            data: {
                booksArr : [],
                form : [
                    title = "",
                    author = "",
                ],
            },
            methods: {
                loadBookList(){
                    axios.get('api/book/all').then((response)=>{
                        this.booksArr = response.data;
                        console.log(this.booksArr);
                    });
                },
                addBook(){
                    axios.post('api/book/add', {
                        'title' : this.form.title,
                        'author' : this.form.author,
                    }).then((response)=>{
                        console.log(this.booksArr);
                    });
                    this.loadBookList();
                },
                deleteBook(id){
                    axios.delete('api/book/delete/' + id).then((response) => {
                        console.log(response);
                    });
                    this.loadBookList();
                },
                changeBookAvailability(id){
                    axios.put('api/book/change_availabilty/' + id).then((response) => {
                        console.log(response);
                    });
                    this.loadBookList();
                }
            },
            mounted(){
                // Сразу после загрузки страницы подгружаем список книг и отображаем его
                this.loadBookList();
            }
        });
    axios.post('api/token', {
        email: "admin@test.com",
        password: "admin",
        device_name: navigator.userAgent
    }).then(response => {
        console.log('Token', response.data);
    })
    axios.get('api/user', {
        headers: {
            "Authorization" : 'Bearer ' + token
        }
    }).then(response => {
        console.log(response.data);
    });
    </script>
    @endverbatim
</body>
</html>
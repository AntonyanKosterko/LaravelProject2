<template>
    <div id="app">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
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
                    <tr v-for="(book, index) in booksArr" :key="book.name">
                        <th scope="row">{{ index+1 }}</th>
                        <td>{{ book['title'] }}</td>
                        <td>{{ book['author'] }}</td>
                        <td>
                            <button v-if="book['availability']" type="button" class="btn btn-outline-primary" v-on:click="changeBookAvailability(book['id'])">
                                Доступна
                            </button>
                            <button v-else type="button" class="btn btn-outline-primary" v-on:click="changeBookAvailability(book['id'])">
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
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control"></td>
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
</template>

<style scoped>
</style>
<script>

export default {
    data(){
        return {
            booksArr : [],
        
            form : {
                title : "",
                author : "",
            },
        }
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
};
</script>

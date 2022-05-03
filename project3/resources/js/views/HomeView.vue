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
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(book, index) in booksArr" :key="book.name">
                        <th scope="row">{{ index+1 }}</th>
                        <td>{{ book['title'] }}</td>
                        <td>{{ book['author'] }}</td>
                        <td>
                            <p v-if="book['availability']" type="button" class="">
                                Доступна
                            </p>
                            <p v-else type="button" class="">
                                Выдана
                            </p>
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
            token : null,
            isAuth: false,
        }
    },
    methods: {
        loadBookList(){
            axios.get('api/book/all').then((response)=>{
                this.booksArr = response.data;
                console.log(this.booksArr);
            });
        },

        checkToken(){
            this.token = localStorage.getItem('token');
            if(this.token == null){
                this.isAuth = false;
            }else{
                this.getUser();
                this.isAuth = true;
            }
        },

        getUser(){
            axios.get('api/user', {
                headers: {
                    "Authorization" : 'Bearer ' + this.token,
                }
                }).then(response => {
                    console.log(response.data);
            });
        },

        getAuthInfo(){
            this.catchAuthInfo({
                isAuth : this.isAuth,
            });
        }
        
    },
    mounted(){
        this.checkToken();
        this.getAuthInfo();
        // Сразу после загрузки страницы подгружаем список книг и отображаем его
        this.loadBookList();
    },

    props: ['catchAuthInfo'],
};


</script>

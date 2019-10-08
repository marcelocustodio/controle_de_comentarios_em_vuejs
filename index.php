<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- VueJS -->
    
    
    <title>Controle de Comentários em VueJS</title>
  </head>
  <body>
      <div id="app"></div>
      <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
      <script>
          new Vue({
              el: '#app',
              template:`
              <div class="container">
        <h1>Comentários</h1>
        <hr>
        <div class="form-todo form-group">
            <p>
                <input placeholder="nome" type="text" name="author" v-model="name" class="form-control" />
            </p>
            <p>
                <textarea placeholder="Comentário" name="message" v-model="message" class="form-control"></textarea>
            </p>
            <button type="submit" v-on:click="addComment" class="btn btn-primary">Comentar</button>
        </div>
        <div class="list-group">
                        
            <div class="list-group-item" v-for="(comment, index) in allComments">
                <span class="comment__author">Author: <strong>{{comment.name}}</strong></span>
                <p>{{comment.message}}</p>
                <div>
                    <a href="#" v-on:click.prevent="removeComment" title="Excluir">Excluir</a>
                </div>
            </div>
        </div>
        <hr>
    </div>
            `,
                            data() {
                                return {
                                    comments: [
                                        {
                                            name: 'Marcelo',
                                            message: 'Lorem Ipsum'
                                        }
                                    ],
                                    name: '',
                                    message: ''
                                }
                            },
                            methods: {
                                addComment() {
                                    
                                    if (this.message.trim()==='' ) {
                                        return;
                                    }
                                    
                                    this.comments.push({
                                        name: this.name,
                                        message: this.message
                                    });
                                    
                                    this.name = '';
                                    this.message = '';
                                },
                                removeComment(index) {
                                    this.comments.splice(index, 1);
                                }
                            },
                                    computed: {
                                        allComments() {
                                            return this.comments.map(comment => ({
                                                ...comment,
                                                name: comment.name.trim() === '' ? 'Anonimo' : comment.name
                                            }))
                                        }
                                    },
                                    watch: {
                                         comments(val) {
                                             //
                                         }
                                    }
          })
      </script>
    
  </body>
</html>
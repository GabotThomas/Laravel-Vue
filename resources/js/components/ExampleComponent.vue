

<script setup>
import { ref, watch, onMounted, reactive, computed } from "@vue/runtime-core";
import { DELETE, POST } from "../methods.js";
import useCounter from "../useCounter.js";
import useFetch from "../useFetch.js";
import useState from "../useState.js";
import TodoListLine from "./TodoListLineComponent.vue";

const [result, load, loading] = useFetch();
const [resultSend, loadSend, loadingSend] = useFetch();

const [newTodo, setNewTodo] = useState("");
const todoLists = ref([]);

const handleLoad = () => {
  load({
    url: "todolist",
  });
};

const handleAdd = (newTodoGiven) => {
  const todoTemp = todoLists.value.slice();
  todoTemp.unshift(newTodoGiven);
  todoLists.value = todoTemp;
  setNewTodo("");
};

const handleDelete = (index) => {
  todoLists.value.splice(index, 1);
};

const handleSubmit = (e) => {
  e.preventDefault();
  loadSend({
    url: "todolist",
    method: POST,
    body: {
      value: newTodo(),
    },
  });
};

const setValue = ({ target }) => {
  setNewTodo(target.value);
};

watch(result, (currentValue, oldValue) => {
  if (currentValue && currentValue.success) {
    todoLists.value = currentValue.todoLists;
  }
});

watch(resultSend, (currentValue, oldValue) => {
  if (currentValue && currentValue.success) {
    handleAdd(currentValue.todoList);
  }
});

onMounted(() => {
  handleLoad();
});
</script>

<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Todo List</div>
          <form method="POST">
            <input
              @input="setValue"
              :value="newTodo()"
              type="text"
              name="message"
            />
            <input v-on:click.prevent="handleSubmit" type="submit" />
          </form>
          <div class="card-body">
            <div v-if="loading">Loading</div>
            <ul v-else>
              <TodoListLine
                v-for="(todolist, index) in todoLists"
                :key="todolist.id"
                :todo-list="todolist"
                :index="index"
                :handle-delete-call-back="handleDelete"
              >
              </TodoListLine>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

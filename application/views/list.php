<div class="actionbar">
    <button id="create">Crear ToDo</button>
</div>

<style>
    .create-task {
        box-sizing: border-box;
        display: flex;
        width: 100%;
        justify-content: center;
        align-content: center;
    }

    .create-task input {
        width: 100%;
        margin-right: 10px;
        box-sizing: border-box;
    }

    .float-add {
        position: fixed;
        top: 15px;
        right: 15px;
        border: none;
        background: white;
        cursor: pointer;
    }

    .todo {
        background: white;
        padding: 20px;
        margin-bottom: 10px;
    }

    .todo ul {
        padding: 0;
        list-style: none;
    }

    .todo .actions {
        display: flex;
        align-items: flex-end;
        justify-content: end;
    }
</style>

<div class="float-form">
    <button class="float-add">Añadir</button>
    <?php echo form_open("/todo", ["method" => "POST"]); ?>
    <h1 id="floatTitle">Crear ToDo</h1>
    <input type="hidden" name="id" name="hiddenId" value="<?php echo $_SESSION["id"]; ?>">
    <input type="hidden" id="noteID" name="noteID" value="">
    <input type="hidden" id="isEditting" name="editing" value="false">
    <input type="text" required id="nameText" placeholder="Nombre" name="name">
    <div id="holder">
        <div class="create-task">
            <input type="text">
            <a href="#" class="delete">Eliminar</a>
        </div>
    </div>
    <button>Guardar</button>
    <a href="#" id="cancelCreation">Cancelar</a>
    </form>
</div>

<div>
    <?php foreach ($todo as $value) : ?>
        <div class="todo">
            <h1><?php echo $value[0]->name ?></h1>
            <ul>
                <?php foreach ($value[1] as $task) : ?>
                    <li>♦ <?php echo $task->text ?></li>
                <?php endforeach ?>
                <div class="actions">
                    <?php echo form_open("/todo", ["method" => "POST"]); ?>
                    <input type="hidden" name="delete" value="<?php echo $value[0]->id; ?>">
                    <button>Eliminar</button>
                    </form>
                </div>
            </ul>
        </div>
    <?php endforeach ?>
</div>

<script src="<?php echo base_url(); ?>js/notes.js" defer></script>
<script>
    let items = []

    const holder = document.querySelector("#holder")
    const addBtn = document.querySelector(".float-add")
    addBtn.addEventListener("click", () => {
        createTask()
        generateTasks()
    })

    const generateTasks = () => {
        holder.innerHTML = ""
        if (items.length === 0) {
            createTask()
        }

        items.forEach(element => {
            holder.appendChild(element)
        });
    }

    const createTask = () => {
        const idx = items.length
        const task = document.createElement("div")
        task.classList.add("create-task")
        const input = document.createElement("input")
        input.id = "task-" + idx
        input.name = "task-" + idx
        task.appendChild(input)
        const reference = document.createElement("a")
        reference.classList.add("delete")
        reference.dataset.index = idx
        reference.href = "#"
        reference.innerText = "Eliminar"
        reference.addEventListener("click", (e) => {
            e.preventDefault()
            items.splice(idx, 1)
            alert(idx)
            generateTasks()
        })
        task.appendChild(reference)
        items.push(task)
    }

    generateTasks()

    if (document.querySelector("#cancelCreation")) {
        const cancel = document.querySelector("#cancelCreation")
        console.log("HELLO")
        console.log({
            cancel
        })
        cancel.addEventListener("click", () => {
            float.classList.toggle("active")
        })
    }
</script>
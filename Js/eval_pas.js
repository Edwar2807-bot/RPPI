let count = 0;
const maxFields = 3;

function addFields() {
    if (count >= maxFields) {
        alert("Has alcanzado el número máximo de Llamados de atencion.");
        return;
    }

    // Verificar que los campos existentes estén llenos
    const inputs = document.querySelectorAll('#form-container input[type="text"], #form-container input[type="date"]');
    for (let input of inputs) {
        if (input.value.trim() === "") {
            alert("Por favor, llene todos los campos antes de agregar nuevos.");
            return;
        }
    }

    // Crear un contenedor para los nuevos campos
    const container = document.createElement("div");
    container.className = "field-container";

    // Crear el contenedor para los campos de fecha y actividad
    const subContainer = document.createElement("div");
    subContainer.className = "sub-container";

    // Crear el campo de Actividad numerado
    const actividadContainer = document.createElement("div");
    actividadContainer.className = "input-container";
    const actividadLabel = document.createElement("label");
    actividadLabel.innerText = `Llamado de atencion ${count + 1} `;
    actividadLabel.className = "activity-label"; // Agregar clase
    const actividadInput = document.createElement("input");
    actividadInput.type = "text";
    actividadInput.name = `Llamado de atencion${count + 1}`;
    actividadInput.placeholder = `Ingrese el llamado de atencion ${count + 1}`;
    actividadInput.className = "activity-input"; // Agregar clase


    // Agregar los labels e inputs a sus contenedores
    actividadContainer.appendChild(actividadLabel);
    actividadContainer.appendChild(actividadInput);

    // Agregar los contenedores al subcontenedor
    subContainer.appendChild(actividadContainer);

    // Agregar el subcontenedor al contenedor principal
    container.appendChild(subContainer);

    // Agregar el contenedor al formulario
    document.getElementById("form-container").appendChild(container);

    count++;
}

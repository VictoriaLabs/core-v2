    document.addEventListener('DOMContentLoaded', (event) => {
        setupAddButton();
        setupSaveButton();
    });

    function setupAddButton() {
        document.getElementById('addBtn').addEventListener('click', function() {
            addRowToTable();
        });
    }

    function setupSaveButton() {
        document.getElementById('saveBtn').addEventListener('click', function() {
            saveContracts();
        });
    }

    function addRowToTable() {
        var receiverUser = document.getElementById('receiver_user_id').selectedOptions[0].text;
        var event = document.getElementById('event').value;
        var action = document.getElementById('action').value;
        var message = document.getElementById('message').value;

        var table = document.getElementById('contractTable').getElementsByTagName('tbody')[0];
        var row = table.insertRow();

        row.insertCell().innerText = receiverUser; // Ajouter le destinataire
        row.insertCell().innerText = event; // Utiliser la valeur de l'élément 'event' pour l'événement
        row.insertCell().innerText = action;
        if (action === 'sendMessage') {
            row.insertCell().innerText = message;
        }
    }

    function saveContracts() {
        var saveBtn = document.getElementById('saveBtn');
        var loader = document.getElementById('loader');
        var senderUserId = document.body.dataset.userId;
        var receiverUserId = document.getElementById('receiver_user_id').value;
        var table = document.getElementById('contractTable').getElementsByTagName('tbody')[0];
        var contracts = [];

        saveBtn.disabled = true;
        loader.style.display = 'inline-block';

        for (var i = 0; i < table.rows.length; i++) {
            var row = table.rows[i];
            var contract = {
                sender_user_id: senderUserId,
                receiver_user_id: receiverUserId,
                receiverUserName: row.cells[0].innerText,
                event: row.cells[1].innerText,
                action: row.cells[2].innerText,
                message: row.cells[3] ? row.cells[3].innerText : null
            };
                contracts.push(contract);
        }

            // displayContracts(contracts);

            // Send the contracts to the server
            fetch('/save-contract', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
            body: JSON.stringify(contracts)
        }).then(response => {
            saveBtn.disabled = false;
            loader.style.display = 'none';
            if (response.ok) {
            alert('Contract saved successfully');
            window.location.reload();
        } else {
            alert('Failed to save contract');
        }
        });
    }

    // function clearTable() {
    //     var table = document.getElementById('contractTable').getElementsByTagName('tbody')[0];
    //     while (table.rows.length > 0) {
    //         table.deleteRow(0);
    //     }
    // }

    function displayContracts(contracts) {
        var contractDisplay = document.getElementById('contractDisplay');
        contractDisplay.textContent = JSON.stringify(contracts, null, 2);
    }

    function handleActionChange(select) {
        var messageGroup = document.getElementById('messageGroup');
        if (select.value === 'sendMessage') {
        messageGroup.style.display = 'block';
        } else {
            messageGroup.style.display = 'none';
        }

    }

    document.addEventListener('DOMContentLoaded', (event) => {
        var deleteIcons = document.querySelectorAll('.delete-icon');
        deleteIcons.forEach(function(icon) {
            icon.addEventListener('click', function() {
                var contractId = this.dataset.contractId;
                deleteContract(contractId);
            });
        });
    });

    function deleteContract(contractId) {
        fetch('/delete-contract/' + contractId, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => {
            if (response.ok) {
                alert('Contract deleted successfully');
                window.location.reload();
            } else {
                alert('Failed to delete contract');
            }
        });
    }

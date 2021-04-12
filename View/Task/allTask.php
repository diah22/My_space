
<table class="table">
    <tr>
        <th>Tâches</th>
        <th id="state">Statut</th>
    </tr>
    <?php
        foreach($tasks as $task){
        ?>
        <tr>
            <td class="row-data"><?php echo $task['contenu']?></td>
            <td class="row-data">
                <div class="state-content">
                    <a class="link-task-update" href='#'>En cours</a>
                    <a class="link-task-update" href='#'>Annuler</a>
                    <a class="link-task-update" href='#'>Terminer</a>
                </div>
            </td>
        </tr>
        <?php
        }
    ?>
</table>
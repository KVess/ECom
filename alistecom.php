<?php 

require_once("core/controller/commandeServ.php");

?>

<!DOCTYPE html>

<html lang="fr">
<head>

    <title>Mes Commandes</title>

<?php include 'asset/fonc/menu.php'; ?> 

<section id="tabs" class="project-tab">/
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#a1" role="tab" aria-controls="nav-home" aria-selected="true">Non Traite</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#a2" role="tab" aria-controls="nav-profile" aria-selected="false">Traite</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="a1" role="tabpanel" aria-labelledby="nav-home-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Montant</th>
                                            <th>Statut</th>
                                            <td>Utilisateur</td>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($commandeNonTraite)) {
                                        foreach ($commandeNonTraite as $commande) {
                                            $commande["compte"] = compteSelectById($commande["id_compte"])[0];
                                        ?>
                                            <tr>
                                                <td><?php echo $commande["date"]; ?></td>
                                                <td><?php echo $commande["montant"]; ?></td>
                                                <td><?php echo $commande["status"]; ?></td>
                                                <td><?php echo $commande["compte"]["username"]; ?></td>
                                                <td><a class="ajax-action-links" href='detailcom.php?id=<?php echo $commande['id_commande']; ?>'>Detail</a></td>
                                            </tr>
                                        <!-- <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td> 
                                            <td>july@example.com</td>

                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                            <td>july@example.com</td>

                                        </tr> -->
                                        <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="a2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <table class="table" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Date</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                        <td>Utilisateur</td>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if (!empty($commandeTraite)) {
                                        foreach ($commandeTraite as $commande) {
                                            $commande["compte"] = compteSelectById($commande["id_compte"])[0];
                                        ?>
                                        <tr>
                                            <td><?php echo $commande["date"]; ?></td>
                                            <td><?php echo $commande["montant"]; ?></td>
                                            <td><?php echo $commande["status"]; ?></td>
                                            <td><?php echo $commande["compte"]["username"]; ?></td>
                                            <td><a class="ajax-action-links" href='detailcom.php?id=<?php echo $commande['id_commande']; ?>'>Detail</a></td>
                                        </tr>
                                        <?php
                                        }
                                    }
                                    ?>
                                        <!-- <tr>
                                            <td><a href="#">Work 2</a></td>
                                            <td>Moe</td>
                                            <td>mary@example.com</td>
                                            <td>july@example.com</td>

                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                            <td>july@example.com</td>

                                        </tr>
                                        <tr>
                                            <td><a href="#">Work 3</a></td>
                                            <td>Dooley</td>
                                            <td>july@example.com</td>
                                            <td>july@example.com</td>

                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                                    
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include 'asset/fonc/footer.php'; ?>
</body>
</html>
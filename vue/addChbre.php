
    <h2 class="text-center">Ajouter Chambres</h2>

    <form method="post" action="" enctype="multipart/form-data">
        
    <div class="form-group">
        <label for="">Prix</label>
        <input type="text" class="form-control" name="prix">
        <span id="prixError" class="text-danger"></span>
    </div>

        <div class="form-group">
            <label for="">Nombre lits</label>
            <input type="text" class="form-control" name="nbLits">
            <span id = "nbLitsError" class="text-danger"></span>
        </div>

        <div class="form-group">
            <label for="">Capacité</label>
            <input type="text" class="form-control" name="nbPers">
            <span id = "nbPersError" class="text-danger"></span>
        </div>

        <div class="form-group">
            <label for="">Photo</label>
            <input type="file" accept="image/*" class="form-control" name="image">
        </div>

        <div class="form-group">
            <label for="">Description</label>
            <textarea name="description" id="" class="form-control"></textarea>
        </div>
  
        
        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
    </form>

    <script src="utils/js/addChbre.js"></script>

    
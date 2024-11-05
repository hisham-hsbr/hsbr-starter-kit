   <!-- Soft Delete Confirmation Modal -->
   <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModalLabel"
       aria-hidden="true">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="deleteConfirmModalLabel">Delete Confirmation</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <p>Are you sure you want to delete " <span style="color: red" id="modal-item-name"></span> " ?</p>
               </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                   <button type="button" id="confirmDeleteBtn" class="btn btn-danger">Delete</button>
               </div>
           </div>
       </div>
   </div>

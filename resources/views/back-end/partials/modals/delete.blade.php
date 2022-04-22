<div id="deleteModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Bạn có muốn xóa?</h4>
			</div>
			<div class="modal-body">	
				<form id="modal-form-delete" action="" method="POST">
		          @csrf
		          @method('DELETE')
		          <button class="btn hoi" type="submit">Có</button>
		          <button type="button" class="close" data-dismiss="modal">Không
				 </button>
		        </form>			
			</div>
		</div>
	</div>
</div>
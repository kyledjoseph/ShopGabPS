				<section id="products">
					
					<?= Html::anchor('chats', 'My Chats') ?>

				</section>


				<?= Form::open(array('action' => 'home/subscribe')) ?>

					<input name="email" type="text">
					<button type="submit">subscribe</button>

				</form>
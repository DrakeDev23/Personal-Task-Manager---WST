/* Taskero UI script: initialize password toggles and delete confirmations robustly */
(function(){
	function setHtml(el, html){ if(el) el.innerHTML = html }

	function init(){
		try{
			// password toggle (login)
			const toggle = document.getElementById('togglePassword')
			const pass = document.getElementById('password')
			if(toggle && pass){
				toggle.addEventListener('click', ()=>{
					if(pass.type === 'password'){
						pass.type = 'text'
						setHtml(toggle, '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 3l18 18" stroke="#374151" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.88 9.88A3 3 0 0114.12 14.12" stroke="#374151" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>')
					} else {
						pass.type = 'password'
						setHtml(toggle, '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="#374151" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="3" stroke="#374151" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>')
					}
				})
			}

			// registration password toggles
			const toggleReg = document.getElementById('togglePasswordReg')
			const passReg = document.getElementById('password_reg')
			if(toggleReg && passReg){
				toggleReg.addEventListener('click', ()=>{
					if(passReg.type === 'password'){
						passReg.type = 'text'
						setHtml(toggleReg, '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 3l18 18" stroke="#374151" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.88 9.88A3 3 0 0114.12 14.12" stroke="#374151" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>')
					} else {
						passReg.type = 'password'
						setHtml(toggleReg, '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="#374151" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="3" stroke="#374151" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>')
					}
				})
			}

			// confirm password toggle (register) — keep working
			const toggleConfirm = document.getElementById('togglePasswordConfirm')
			const passConfirm = document.getElementById('password_confirmation')
			if(toggleConfirm && passConfirm){
				toggleConfirm.addEventListener('click', ()=>{
					if(passConfirm.type === 'password'){
						passConfirm.type = 'text'
						setHtml(toggleConfirm, '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 3l18 18" stroke="#374151" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.88 9.88A3 3 0 0114.12 14.12" stroke="#374151" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>')
					} else {
						passConfirm.type = 'password'
						setHtml(toggleConfirm, '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" stroke="#374151" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="3" stroke="#374151" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg>')
					}
				})
			}

			// confirm deletion
			document.querySelectorAll('form.inline').forEach(f=>{
				f.addEventListener('submit', e=>{
					if(f.querySelector('button') && f.querySelector('button').textContent.trim().toLowerCase().includes('delete')){
						if(!confirm('Are you sure you want to delete this task?')) e.preventDefault();
					}
				})
			})
		}catch(err){
			console.error('UI init error', err)
		}
	}

	if(document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init)
	else init()
})();
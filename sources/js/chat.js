var BAAS = BAAS || {};

BAAS.cocoa = {
		init:function(){
				this.setParameters();
				this.bindEvent();
		},

		setParameters:function(){
			this.$name = $('#jsi-name');
			this.$textArea = $('#jsi-msg');
			this.$board = $('#jsi-board');
			this.$button = $('#jsi-button');
			this.$msgDom = $('<li>');

			this.chatDataStore = new MilkCocoa('zoojxiyy95j.mlkcca.com').dataStore('chatRoom');
		},

		bindEvent:function(){
			var self = this;
			this.$button.on('click',function(){
					self.sendMsg();
			});

			//pushを監視
			this.chatDataStore.on('push',function(data){
					self.addText(data.value.user);
					self.addText(data.value.message);
			});
			this.chatDataStore.stream().sort("desc").next(function(err, datas) {
				datas.forEach(function(data) {
					console.log(self);
					console.log(data);
					self.addText(data.value.user);
					self.addText(data.value.message);
				});
			});
		},

		//ユーザー、メッセージ送信
		sendMsg:function(){
				if (this.$textArea.val() == ''){ return }

				var self = this;
				var name = this.$name.val();
				var text = this.$textArea.val();
				self.chatDataStore.push({user:name, message:text},function(data){
						self.$textArea.val('');
				});
		},

		//受け取り後の処理
		addText:function(json){
				var msgDom = $('<li>');
				msgDom.html(json);
				this.$board.append(msgDom[0]);
		}
}

$(function(){
		BAAS.cocoa.init();
});

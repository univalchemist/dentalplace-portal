<script>
	const baseURL = 'https://portal.dentalplace.app/nodejs'
	const socketURL = 'https://portal.dentalplace.app'
	// const baseURL = 'http://localhost:3000';
	// const socketURL = 'http://localhost:3000'

	const socket = io(socketURL);
	const userId = <?php echo $userId; ?>;

	let chatRooms = [];
	let chats = [];

	let activeRoom = null;

	const onRecipientClick = (roomObj) => {
		if (activeRoom !== null) {
			if(activeRoom.room_name === roomObj.room_name) {
				return;
			}
		}

		loadChats(roomObj.room_name);
		setActiveRoom(roomObj);
	}

	const loadChats = (roomName) => {
		console.log('GETTING CHATS for ROOM ' + roomName);
		$('#chats').empty();
		$.get(`${baseURL}/api/chat?roomName=${roomName}`, (response, status) => {
			console.log(response.data);
			console.log(status);
			if (response.data.length > 0) {
				chats = response.data;
				$.each(chats, (index, chat) => {
					appendChat(index, chat);
				});

				$('#chats').animate({scrollTop: $('#chats')[0].scrollHeight}, 1000);
			}
		});
	}

	const setActiveRoom = (roomObj) => {
		if (activeRoom !== null) {
			socket.removeAllListeners(activeRoom.room_name);
			$('#chatRoom_' + activeRoom.room_name).removeClass('active');
		}

		activeRoom = roomObj;
		$('#chatRoom_' + activeRoom.room_name).addClass('active');
		console.log('Setting active room as ' + activeRoom);
		socket.on(activeRoom.room_name, (data) => {
			console.log('CHAT: ', data);
			appendChat(0, data);
			$('#chats').animate({scrollTop: $('#chats')[0].scrollHeight}, 1000);
		});
	}

	const appendRecipient = (index, chatRoom) => {
		$('#cprWrap').append(
				"<div id='chatRoom_" + chatRoom.room_name +"' class='cp-recipient' onclick='onRecipientClick(" + JSON.stringify(chatRoom) + ")'>\n" +
				'\t<div class="cpr-avatar-wrap">\n' +
				'\t\t<div class="cpr-avatar">\n' +
				'\t\t\t<img src="../../../assets/img/user.png"/>\n' +
				'\t\t</div>\n' +
				'\t\t<div class="online-indicator"></div>\n' +
				'\t</div>\n' +
				'\t<div class="cpr-details">\n' +
				'\t\t<div class="cpr-top">\n' +
				'\t\t\t<div class="cpr-name">' + chatRoom.recipient_name +'</div>\n' +
				'\t\t\t<div class="cpr-date">' + moment(chatRoom.updated_at).format('hh:mmA') + '</div>\n' +
				'\t\t</div>\n' +
				'\t\t<div class="cpr-last-chat">\n' +
				'\t\t\t' + chatRoom.last_message +'\n' +
				'\t\t</div>\n' +
				'\t</div>\n' +
				'</div>\n' +
				'<div id="divider_' + chatRoom.room_name + '" class="divider"></div>'
		);
	}

	const prependRecipient = (index, chatRoom) => {
		$('#cprWrap').prepend(
				"<div id='chatRoom_" + chatRoom.room_name +"' class='cp-recipient' onclick='onRecipientClick(" + JSON.stringify(chatRoom) + ")'>\n" +
				'\t<div class="cpr-avatar-wrap">\n' +
				'\t\t<div class="cpr-avatar">\n' +
				'\t\t\t<img src="../../../assets/img/user.png"/>\n' +
				'\t\t</div>\n' +
				'\t\t<div class="online-indicator"></div>\n' +
				'\t</div>\n' +
				'\t<div class="cpr-details">\n' +
				'\t\t<div class="cpr-top">\n' +
				'\t\t\t<div class="cpr-name">' + chatRoom.recipient_name +'</div>\n' +
				'\t\t\t<div class="cpr-date">' + moment(chatRoom.updated_at).format('hh:mmA') + '</div>\n' +
				'\t\t</div>\n' +
				'\t\t<div class="cpr-last-chat">\n' +
				'\t\t\t' + chatRoom.last_message +'\n' +
				'\t\t</div>\n' +
				'\t</div>\n' +
				'</div>\n' +
				'<div id="divider_' + chatRoom.room_name + '" class="divider"></div>'
		);
	}

	const appendChat = (index, chat) => {
		console.log(userId);

		if(userId === parseInt(chat.senderId)) {
			appendMeChat(index, chat);
		}else{
			appendThemChat(index, chat);
		}
	}

	const appendMeChat = (index, chat) => {
		$('#chats').append(
			'<div class="cp-chat me-wrap">\n' +
			'\t<div class="me">\n' +
			'\t\t<div class="me-top">' + moment(chat.created_at).format('MMM MM, YYYY hh:mm A') + '</div>\n' +
			'\t\t<div class="me-bottom">\n' +
			'\t\t\t<div class="me-message">' + chat.message +
			'\t\t\t</div>\n' +
			'\t\t\t<div class="me-avatar-wrap">\n' +
			'\t\t\t\t<div class="me-avatar">\n' +
			'\t\t\t\t\t<i class="fas fa-user" style="font-size:20px;color:#FFF;"></i>\n' +
			'\t\t\t\t</div>\n' +
			'\t\t\t\t<div class="online-indicator"></div>\n' +
			'\t\t\t</div>\n' +
			'\t\t</div>\n' +
			'\t</div>\n' +
			'</div>'
		);
	}

	const appendThemChat = (index, chat) => {
		$('#chats').append(
				'<div class="cp-chat them-wrap">\n' +
				'\t<div id="themChat_' + chat.serviceBookingId + '" class="them">\n' +
				'\t\t<div class="them-top">' + moment(chat.created_at).format('MMM MM, YYYY hh:mm A') + '</div>\n' +
				'\t\t<div class="them-bottom">\n' +
				'\t\t\t<div class="them-avatar-wrap">\n' +
				'\t\t\t\t<div class="them-avatar">\n' +
				'\t\t\t\t\t<i class="fas fa-user" style="font-size:20px;color:#FFF;"></i>\n' +
				'\t\t\t\t</div>\n' +
				'\t\t\t\t<div class="online-indicator"></div>\n' +
				'\t\t\t</div>\n' +
				'\t\t\t<div class="them-message">' + chat.message +
				'\t\t\t</div>\n' +
				'\t\t</div>\n' +
				'\t</div>\n' +
				'</div>'
		);

		if(chat.serviceBookingId) {
			if(!chat.confirmByUser && !chat.confirmByClinic) {
				const chatObjString = JSON.stringify(chat);
				console.log(chatObjString);

				$('#themChat_' + chat.serviceBookingId).append(
						"<div id='chatBooking_" + chat.serviceBookingId + "' class='them-bottom'>\n" +
						"\t<div class='them-avatar-wrap'></div>\n" +
						"\t<div class='them-message-action'>\n" +
						"\t\t<button class='accept-btn' onclick='acceptBooking(" +chatObjString+ ")'>Accept</button>\n" +
						"\t\t<button class='decline-btn' onclick='declineBooking(" +chatObjString+ ")'>Decline</button>\n" +
						"\t</div>\n" +
						"</div>"
				);
			}
		}
	}

	const acceptBooking = (chatObj) => {
		// console.log('Accept Booking:', JSON.parse(chatObjString));
		console.log(chatObj);
		const acceptBookingBody = {
			"id": chatObj.serviceBookingId,
			"clinicId": chatObj.receiverId,
			"ownerId": chatObj.receiverName,
			"userId": chatObj.senderId,
			"full_name": chatObj.senderName,
			"serviceName": chatObj.serviceName,
			"appointment_date": chatObj.appointment_date,
			"time": chatObj.time
		};

		$.post(`${baseURL}/api/confirmBookingByClinic`, acceptBookingBody, (data, status) => {
			if (status === 'success') {
				console.log('Accepted booking');
				$("#chatBooking_" + chatObj.serviceBookingId).remove();
			}else{
				console.log('Something wend wrong', data);
			}
		});
	}

	const declineBooking = (chatObj) => {
		// console.log('Decline Booking:', JSON.parse(chatObjString));
		console.log(chatObj);
		console.log(chatObj);
		const acceptBookingBody = {
			"id": chatObj.serviceBookingId,
			"clinicId": chatObj.receiverId,
			"ownerId": chatObj.receiverName,
			"userId": chatObj.senderId,
			"full_name": chatObj.senderName,
			"serviceName": chatObj.serviceName,
			"appointment_date": chatObj.appointment_date,
			"time": chatObj.time
		};

		$.post(`${baseURL}/api/declineBookingByClinic`, acceptBookingBody, (data, status) => {
			if (status === 'success') {
				console.log('Booking declined');
				$("#chatBooking_" + chatObj.serviceBookingId).remove();
			}else{
				console.log('Something wend wrong', data);
			}
		});
	}

	const sendChat = () => {
		if(activeRoom === null) {
			return;
		}

		const msg = $('#inputChat').val();
		$('#inputChat').val('');

		const chatPayload = {
			"senderId": activeRoom.senderId,
			"senderName": activeRoom.sender_name,
			"receiverId": activeRoom.recipientId,
			"receiverName": activeRoom.recipient_name,
			"message": msg
		};

		$.post(`${baseURL}/api/chat`, chatPayload, (data, status) => {
			if (status === 'success') {
				console.log('Chat sent!');
			}else{
				console.log('Something wend wrong', data);
			}
		});
	}

	const sendBooking = () => {
		const svcId = $('.bk-service').val();
		const svcName = $('.bk-service option:selected').text();
		const svcDate = moment($('.bk-date').val()).format('MM/DD/YYYY');

		const time = $('.bk-time').val();
		const timeSplit = time.split(':');
		let hours,minutes,meridian;

		hours = timeSplit[0];
		minutes = timeSplit[1];

		if (hours > 12) {
			meridian = 'PM';
			hours -= 12;
		} else if (hours < 12) {
			meridian = 'AM';
			if (hours === 0) {
				hours = 12;
			}
		} else {
			meridian = 'PM';
		}

		const svcTime = `${hours}:${minutes} ${meridian}`;

		const bookingBody = {
			"userId": activeRoom.recipientId,
			"full_name": activeRoom.recipient_name,
			"ownerId": activeRoom.sender_name,
			"clinicId": activeRoom.senderId,
			"serviceId": svcId,
			"serviceName": svcName,
			"time": svcTime,
			"appointment_date": svcDate
		};

		console.log('Booking user: ', bookingBody);

		$.post(`${baseURL}/api/bookServiceByClinic`, bookingBody, (data, status) => {
			if (status === 'success') {
				console.log(data);
				$('#vendorBookingModal').hide();
			}else{
				console.log('Something wend wrong', data);
			}
		});
	}

	$(() => {
		socket.on('connect', () => {
			console.log('User ' + userId + ' has connected');
		});

		console.log('listening on', 'chatRooms_' + userId);
		socket.on('chatRooms_' + userId, (payload) => {
			$('#chatRoom_' + payload.room_name).remove();
			$('#divider_' + payload.room_name).remove();
			prependRecipient(0, payload);

			if(activeRoom === null) {
				onRecipientClick(payload);
			}else{
				if (activeRoom.room_name === payload.room_name) {
					$('#chatRoom_' + activeRoom.room_name).addClass('active');
				}
			}

			console.log('user_' + userId + ': ', payload);
		});

		console.log('DOM READY...');
		$.get(`${baseURL}/api/chatRoom?userId=${userId}`, (response, status) => {
			if (response.data.length > 0) {
				chatRooms = response.data;
				console.log(chatRooms);
				$.each(chatRooms, (index, chatRoom) => {
					appendRecipient(index, chatRoom);
					if(index === 0) {
						// setActiveRoom(chatRoom.room_name);
						onRecipientClick(chatRoom);
					}
				});
			}
		});

		$('#bookBtn').click(()=>{
			$('#vendorBookingModal').css("display", "flex");
		});

		$('.bk-send').click(()=> {
			if(activeRoom === null) {
				return;
			}

			sendBooking();
		});
	});
</script>

<div class="chat-page">
	<div class="chat-page-body">
		<div class="cp-header">
			<h3><i class="fas fa-comments" style="font-size:24px;"></i> Chat</h3>
		</div>
		<div class="cp-body">
			<div class="cp-recipient-list">
				<div class="cpr-wrap" id="cprWrap"></div>
			</div>
			<div class="cp-chat-wrap">
				<div id="chats" class="cp-chats"></div>
				<div class="cp-actions">
					<button id="bookBtn"><i class="fas fa-calendar-alt" style="font-size:16px;color:#fff"></i></button>
					<div class="compose">
						<input id="inputChat" type="text" placeholder="Type here..."/>
						<button onclick="sendChat()">
							<i class="fas fa-paper-plane" style="font-size:20px;color:#1594CE;"></i>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

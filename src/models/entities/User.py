from werkzeug.security import check_password_hash

class User():  
    def __init__(self, id, username, password):
        self.id = id
        self.username = username
        self.password = password
    @classmethod
    def check_password(self, hash_password, password):
        return check_password_hash(hash_password, password)
     
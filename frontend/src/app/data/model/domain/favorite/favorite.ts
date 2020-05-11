import { Blueprint } from '@model/domain/blueprint/blueprint';
import { User } from '@model/domain/user/user';
import { Uuid } from '@model/shared/uuid';

export interface Favorite {
  id: Uuid,
  by: User,
  to: Blueprint,
  date: Date
}

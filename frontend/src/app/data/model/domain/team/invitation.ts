import { InvitationStatus } from '@model/domain/team/invitation-status';
import { User } from '@model/domain/user/user';
import { Uuid } from '@model/shared/uuid';

export interface Invitation {
  id: Uuid;
  by: User;
  to: User;
  date: Date;
  status: InvitationStatus;
  message: string;
}

<?php
namespace OneCommunity\Requests;

use DateTimeImmutable;
use DateTimeInterface;

class AddAccountRequest extends Request
{
    const CONTACT = 'contact';
    const ORGANISATION = 'organisation';

    const FEMALE = 'f';
    const MALE = 'm';

    /**
     * @var array
     */
    protected $groupIds = [];

    public function __construct()
    {
        $this->setType(static::CONTACT);
    }

    public function getMethod(): string
    {
        return 'POST';
    }

    public function getUri(): string
    {
        return 'accounts/add';
    }

    public function getPayload(): ?array
    {
        return $this->data;
    }

    public function addGroupId(int $groupId): self
    {
        if (!in_array($groupId, $this->groupIds)) {
            $this->groupIds[] = $groupId;
        }

        $groupData = [];
        foreach ($this->groupIds as $id) {
            $groupData[] = ['id' => $id];
        }

        return $this->setData('groups', $groupData);
    }

    public function setBankAccount(string $iban, string $accountHolder, string $bic = null): self
    {
        return $this->setData('bank_accounts', [
            [
                'iban' => $iban,
                'bic' => $bic,
                'account_holder' => $accountHolder,
            ],
        ]);
    }

    public function setTitle(string $title): self
    {
        return $this->setData('title', $title);
    }

    public function getTitle(): string
    {
        return $this->getData('title');
    }

    public function setType(string $type): self
    {
        return $this->setData('type.name', $type);
    }

    public function getType(): string
    {
        return $this->getData('type.name');
    }

    public function setCity(string $city): self
    {
        return $this->setData('city', $city);
    }

    public function getCity(): string
    {
        return $this->getData('city');
    }

    public function setContactUserId(int $id): self
    {
        return $this->setData('contact_user.id', $id);
    }

    public function getContactUserId(): int
    {
        return $this->getData('contact_user.id');
    }

    public function setCountry(string $country): self
    {
        return $this->setData('country', $country);
    }

    public function getCountry(): string
    {
        return $this->getData('country');
    }

    public function setDateOfBirth(DateTimeInterface $date): self
    {
        return $this->setData('date_of_birth', $date->format('Y-m-d'));
    }

    public function getDateOfBirth(): ?DateTimeImmutable
    {
        $dateOfBirth = $this->getData('date_of_birth');

        return $dateOfBirth ? new DateTimeImmutable($dateOfBirth) : null;
    }

    public function setEmail(string $email): self
    {
        return $this->setData('email', $email);
    }

    public function getEmail(): string
    {
        return $this->getData('email');
    }

    public function setFirstName(string $firstName): self
    {
        return $this->setData('first_name', $firstName);
    }

    public function getFirstName(): string
    {
        return $this->getData('first_name');
    }

    public function setGender(string $gender): self
    {
        return $this->setData('gender', $gender);
    }

    public function getGender(): string
    {
        return $this->getData('gender');
    }

    public function setHouseNumber(string $houseNumber): self
    {
        return $this->setData('house_number', $houseNumber);
    }

    public function getHouseNumber(): string
    {
        return $this->getData('house_number');
    }

    public function setHouseNumberAddition(string $houseNumberAddition): self
    {
        return $this->setData('house_number_addition', $houseNumberAddition);
    }

    public function getHouseNumberAddition(): string
    {
        return $this->getData('house_number_addition');
    }

    public function setInfix(string $infix): self
    {
        return $this->setData('infix', $infix);
    }

    public function getInfix(): string
    {
        return $this->getData('infix');
    }

    public function setInitials(string $initials): self
    {
        return $this->setData('initials', $initials);
    }

    public function getInitials(): string
    {
        return $this->getData('initials');
    }

    public function setLastName(string $lastName): self
    {
        return $this->setData('last_name', $lastName);
    }

    public function getLastName(): string
    {
        return $this->getData('last_name');
    }

    public function setNote(string $note): self
    {
        return $this->setData('note', $note);
    }

    public function getNote(): string
    {
        return $this->getData('note');
    }

    public function setPhoneEmergency(string $phoneEmergency): self
    {
        return $this->setData('phone_emergency', $phoneEmergency);
    }

    public function getPhoneEmergency(): string
    {
        return $this->getData('phone_emergency');
    }

    public function setPhoneHome(string $phoneHome): self
    {
        return $this->setData('phone_home', $phoneHome);
    }

    public function getPhoneHome(): string
    {
        return $this->getData('phone_home');
    }

    public function setPhonePrivate(string $phonePrivate): self
    {
        return $this->setData('phone_private', $phonePrivate);
    }

    public function getPhonePrivate(): string
    {
        return $this->getData('phone_private');
    }

    public function setPhoneWork(string $phoneWork): self
    {
        return $this->setData('phone_work', $phoneWork);
    }

    public function getPhoneWork(): string
    {
        return $this->getData('phone_work');
    }

    public function setPostalCity(string $postalCity): self
    {
        return $this->setData('postal_city', $postalCity);
    }

    public function getPostalCity(): string
    {
        return $this->getData('postal_city');
    }

    public function setPostalCountry(string $postalCountry): self
    {
        return $this->setData('postal_country', $postalCountry);
    }

    public function getPostalCountry(): string
    {
        return $this->getData('postal_country');
    }

    public function setPostalHouseNumber(string $postalHouseNumber): self
    {
        return $this->setData('postal_house_number', $postalHouseNumber);
    }

    public function getPostalHouseNumber(): string
    {
        return $this->getData('postal_house_number');
    }

    public function setPostalHouseNumberAddition(string $postalHouseNumberAddition): self
    {
        return $this->setData('postal_house_number_addition', $postalHouseNumberAddition);
    }

    public function getPostalHouseNumberAddition(): string
    {
        return $this->getData('postal_house_number_addition');
    }

    public function setPostalStreet(string $postalStreet): self
    {
        return $this->setData('postal_street', $postalStreet);
    }

    public function getPostalStreet(): string
    {
        return $this->getData('postal_street');
    }

    public function setPostalZipCode(string $postalZipCode): self
    {
        return $this->setData('postal_zip_code', $postalZipCode);
    }

    public function getPostalZipCode(): string
    {
        return $this->getData('postal_zip_code');
    }

    public function setSecondaryEmail(string $secondaryEmail): self
    {
        return $this->setData('secondary_email', $secondaryEmail);
    }

    public function getSecondaryEmail(): string
    {
        return $this->getData('secondary_email');
    }

    public function setStreet(string $street): self
    {
        return $this->setData('street', $street);
    }

    public function getStreet(): string
    {
        return $this->getData('street');
    }

    public function setSubscribeToMails(bool $status): self
    {
        return $this->setData('subscribe_to_mails', $status);
    }

    public function getSubscribeToMails(): bool
    {
        return $this->getData('subscribe_to_mails');
    }

    public function setZipCode(string $zipCode): self
    {
        return $this->setData('zip_code', $zipCode);
    }

    public function getZipCode(): string
    {
        return $this->getData('zip_code');
    }
}
